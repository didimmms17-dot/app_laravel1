<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;

class LibrarySeeder extends Seeder
{
	public function run()
	{
		User::firstOrCreate(
			['email' => 'admin@example.com'],
			['name' => 'Admin','password' => Hash::make('password'),'role' => 'admin']
		);
		User::firstOrCreate(
			['email' => 'librarian@example.com'],
			['name' => 'Librarian','password' => Hash::make('password'),'role' => 'petugas']
		);
		User::firstOrCreate(
			['email' => 'member@example.com'],
			['name' => 'Member','password' => Hash::make('password'),'role' => 'user']
		);

		Book::create([
			'title' => 'Clean Code',
			'author' => 'Robert C. Martin',
			'description' => 'A Handbook of Agile Software Craftsmanship - Panduan lengkap untuk menulis code yang bersih dan mudah dipahami',
			'copies' => 3,
			'publisher' => 'Prentice Hall',
			'year_published' => 2008,
			'pages' => 464,
			'isbn' => '978-0132350884',
			'language' => 'English',
			'type' => 'Buku Cetak',
			'format' => 'Hardcover'
		]);
		Book::create([
			'title' => 'The Pragmatic Programmer',
			'author' => 'Andrew Hunt',
			'description' => 'Your Journey to Mastery - Buku essensial untuk pengembang software profesional',
			'copies' => 2,
			'publisher' => 'Addison-Wesley',
			'year_published' => 1999,
			'pages' => 321,
			'isbn' => '978-0201616224',
			'language' => 'English',
			'type' => 'Buku Cetak',
			'format' => 'Paperback'
		]);
		Book::create([
			'title' => 'Introduction to Algorithms',
			'author' => 'Cormen, Leiserson, Rivest, Stein',
			'description' => 'Comprehensive algorithms textbook - Buku teks algoritma yang paling lengkap dan komprehensif',
			'copies' => 4,
			'publisher' => 'MIT Press',
			'year_published' => 2009,
			'pages' => 1312,
			'isbn' => '978-0262033848',
			'language' => 'English',
			'type' => 'Buku Cetak',
			'format' => 'Hardcover'
		]);
		Book::create([
			'title' => 'Design Patterns',
			'author' => 'Erich Gamma et al.',
			'description' => 'Elements of Reusable Object-Oriented Software - Klasik dalam dunia software engineering',
			'copies' => 2,
			'publisher' => 'Addison-Wesley',
			'year_published' => 1994,
			'pages' => 416,
			'isbn' => '978-0201633610',
			'language' => 'English',
			'type' => 'Buku Cetak',
			'format' => 'Hardcover'
		]);
		Book::create([
			'title' => 'Refactoring',
			'author' => 'Martin Fowler',
			'description' => 'Improving the Design of Existing Code - Teknik penting untuk meningkatkan kualitas kode',
			'copies' => 3,
			'publisher' => 'Addison-Wesley',
			'year_published' => 1999,
			'pages' => 431,
			'isbn' => '978-0201485677',
			'language' => 'English',
			'type' => 'Buku Cetak',
			'format' => 'Hardcover'
		]);
	}
}
