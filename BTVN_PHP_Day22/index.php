<?php
session_start();
include "Book.php";

//$book1 = new Book;
//$book2 = new Book;
//$book3 = new Book;
//
//$book1->name = 'Truyện tranh';
//$book1->amount = 199;
//
//$book2->name = 'Programming';
//$book2->amount = 599;
//
//$book3->name = 'Giáo trình';
//$book3->amount = 399;
//
//$result_insert1 = $book1->insertBook();
//echo $result_insert1;
//$result_insert2 = $book2->insertBook();
//echo  $result_insert2;
//$result_insert3 = $book3->insertBook();
//echo  $result_insert3;

//$book_edit = new Book();
//$book_edit->name = 'Software Engineer';
//$book_edit->amount = 499;
//$result_edit = $book_edit->editBook(8);
//echo $result_edit;
//
//$result_delete1 = $book1->deleteBook(7);
//echo $result_delete1;
//
//echo "<br/>";

$books = new Book;
$books->listBook();

?>

