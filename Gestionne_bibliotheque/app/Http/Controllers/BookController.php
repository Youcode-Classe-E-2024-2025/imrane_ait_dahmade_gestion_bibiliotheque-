<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->id !== 1) {
                abort(403, 'Accès interdit');
            }
            return $next($request);
        })->except(['index', 'show']); // Permettre uniquement la lecture
    }

    // Afficher tous les livres
    public function index()
    {
        $books = Book::all();
        // dd($books);
        return view('books.index', compact('books'));
    }

    // Afficher le formulaire d'ajout d'un livre
    public function create()
    {
        return view('books.create');
    }

    // Ajouter un nouveau livre
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|unique:books',
            'copies_available' => 'required|integer|min:1',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès');
    }

    // Afficher un livre
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Afficher le formulaire d'édition
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Modifier un livre
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'copies_available' => 'required|integer|min:1',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Livre mis à jour');
    }

    // Supprimer un livre
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livre supprimé');
    }
}


