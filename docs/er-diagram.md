# Entity-Relationship Diagram

The database (`370project`) has six tables. Relationships are enforced at the
application level (the original schema declares no foreign keys): courses are
referenced by their subject code `sc`, and a student's course selections and
grades live in `students_courses`, keyed by the student's email.

```mermaid
erDiagram
    STUDENT {
        int id PK
        char name
        varchar email UK
        varchar password "bcrypt hash"
        int st_id
        char dept
        varchar phone
    }

    TEACHER {
        int id PK
        varchar name
        varchar email UK
        varchar password "bcrypt hash"
        int teacher_id
        varchar dept
        int phone
    }

    CMS {
        int id PK
        varchar sc "subject code, e.g. cse370"
        varchar cname "course name"
        varchar image
    }

    STUDENTS_COURSES {
        char student_name
        varchar email FK
        varchar selected_course_1 FK
        varchar selected_course_2 FK
        varchar selected_course_3 FK
        varchar grade_course_id_1
        varchar grade_course_id_2
        varchar grade_course_id_3
    }

    ASSIGNMENT {
        int assignment_number PK
        varchar sc FK
        varchar pdf_file_path
    }

    QUIZ {
        int quiz_number PK
        varchar sc FK
        varchar pdf_file_path
    }

    STUDENT ||--o| STUDENTS_COURSES : "enrolls via email"
    CMS ||--o{ STUDENTS_COURSES : "selected as course 1-3"
    CMS ||--o{ ASSIGNMENT : "has"
    CMS ||--o{ QUIZ : "has"
    TEACHER ||--o{ CMS : "manages"
    TEACHER ||--o{ ASSIGNMENT : "uploads"
    TEACHER ||--o{ QUIZ : "uploads"
```

## Table roles

| Table | Role |
| --- | --- |
| `cms` | Course catalog (subject code, name, cover image) |
| `student` / `teacher` | Account records for the two roles |
| `students_courses` | A student's three selected courses and the grade for each |
| `assignment` / `quiz` | Uploaded PDF materials attached to a course by subject code |
