<?php


class StudentsLoader
{
    /** @var array Student[] */

    private array $students;

    public function __construct($pdo)
    {
        $arrayStudents = array();
        $getStudents = $pdo->prepare("SELECT * FROM student ORDER BY last_name ASC");
        $getStudents->execute();
        $students = $getStudents->fetchAll();
        foreach ($students as $student) {
            $student = new Student($student['id'], $student['first_name'], $student['last_name'],$student['email'], $student['created_at'],$student['password'],$student['image']);
            array_push($arrayStudents, $student);
        }
        $this->students = $arrayStudents;
    }

    public function getStudents()
    {
        return $this->students;
    }


}