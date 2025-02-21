<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // Fonction pour emprunter un livre

    public function index()
{
    // Récupérer tous les emprunts avec les livres associés
    $borrows = Borrow::with('book')->get();
    
    return view('borrow.ListeBorrow', compact('borrows'));
}

    public function borrow($book_id)
    {
        // Récupérer le livre par son ID
        $book = Book::findOrFail($book_id);

        // Vérifier si le livre est disponible pour l'emprunt
        if ($book->copies_available <= 0) {
            return redirect()->route('books.index')->with('error', 'Ce livre n\'est pas disponible pour l\'emprunt.');
        }

        // Enregistrer l'emprunt dans la base de données
        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => now()->addDays(7), // Date de retour prévue dans 7 jours
        ]);

        // Réduire le nombre de copies disponibles du livre
        $book->decrement('copies_available');

        return redirect()->route('books.index')->with('success', 'Vous avez emprunté ce livre avec succès.');
    }

    // Fonction pour retourner un livre
    public function returnBook($borrow_id)
    {
        // Trouver l'emprunt à partir de son ID
        $borrow = Borrow::findOrFail($borrow_id);

        // Vérifier si l'emprunt appartient à l'utilisateur connecté
        if ($borrow->user_id !== Auth::id()) {
            return redirect()->route('books.index')->with('error', 'Vous ne pouvez pas retourner ce livre.');
        }

        // Marquer le livre comme retourné
        $borrow->returned_at = now();
        $borrow->save();

        // Réaugmenter le nombre de copies disponibles du livre
        $borrow->book->increment('copies_available');

        return redirect()->route('books.index')->with('success', 'Vous avez retourné ce livre avec succès.');
    }

    // Afficher la liste des emprunts pour l'utilisateur connecté (ou l'admin)
    public function userBorrows()
    {
        $borrows = Borrow::where('user_id', Auth::id())->with('book')->get();
        
        return view('borrows.index', compact('borrows'));
    }

    // Afficher la liste des emprunts pour l'admin
    public function adminBorrows()
    {
        // Vérifier si l'utilisateur est admin
        if (Auth::user()->id !== 1) {
            return redirect()->route('books.index')->with('error', 'Accès interdit');
        }

        // Récupérer tous les emprunts
        $borrows = Borrow::with('user', 'book')->get();
        
        return view('admin.borrows.index', compact('borrows'));
    }
}
