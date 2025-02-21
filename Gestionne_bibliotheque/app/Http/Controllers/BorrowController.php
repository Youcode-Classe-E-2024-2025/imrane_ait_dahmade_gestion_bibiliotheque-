<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // Afficher tous les emprunts
    public function index()
    {
        return response()->json(Borrow::with(['user', 'book'])->get());
    }

    // Enregistrer un emprunt
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date|after:today',
        ]);

        $book = Book::find($request->book_id);

        if ($book->copies_available > 0) {
            // Réduction du stock disponible
            $book->decrement('copies_available');

            $borrow = Borrow::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'borrowed_at' => now(),
                'due_date' => $request->due_date,
            ]);

            return response()->json(['message' => 'Livre emprunté avec succès', 'borrow' => $borrow]);
        }

        return response()->json(['message' => 'Aucun exemplaire disponible'], 400);
    }

}