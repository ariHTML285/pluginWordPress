<?php
// Connexion à la base de données
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//
$sql = "CREATE TABLE Расписание (
  ID_расписания INT PRIMARY KEY NOT NULL,
  День_недели VARCHAR(20) NOT NULL,
  Номер_пары INT NOT NULL,
  Предмет VARCHAR(50) NOT NULL,
  Видучетнойработы VARCHAR(50) NOT NULL,
  Преподаватель VARCHAR(50) NOT NULL,
  Аудитория VARCHAR(10) NOT NULL,
  Сессия VARCHAR(20) NOT NULL,
  Курс INT NOT NULL,
  Группа_курс INT NOT NULL,
  Направление VARCHAR(50) NOT NULL,
  Факультет VARCHAR(50) NOT NULL,
  Расписание DATE NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Расписание created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}
//
$sql = "CREATE TABLE День_недели (
  ID_дня INT PRIMARY KEY NOT NULL,
  Название VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table День_недели created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}
//
$sql = "CREATE TABLE Номер_пары (
  ID_пары INT PRIMARY KEY NOT NULL,
  Номер INT NOT NULL
)";
//
$sql="CREATE TABLE Предмет (
  ID_предмета INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Видучётнойработы (
  ID_вида INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Преподаватель (
  ID_преподавателя INT PRIMARY KEY NOT NULL,
  ФИО VARCHAR(50) NOT NULL,
  Кафедра VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Аудитория (
  ID_аудитории INT PRIMARY KEY NOT NULL,
  Номер VARCHAR(10) NOT NULL
)";
//
$sql="CREATE TABLE Сессия (
  ID_сессии INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Курс (
  ID_курса INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Группа_курса (
  ID_группы INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL,
  ID_курса INT NOT NULL,
  FOREIGN KEY (ID_курса) REFERENCES Курс(ID_курса)
)";
//
$sql="CREATE TABLE Факультет (
  ID_факультета INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL
)";
//
$sql="CREATE TABLE Направление (
  ID_направления INT PRIMARY KEY NOT NULL,
  Название VARCHAR(50) NOT NULL,
  Код VARCHAR(10) NOT NULL,
  ID_факультета INT NOT NULL,
  FOREIGN KEY (ID_факультета) REFERENCES Факультет(ID_факультета)
)";
