CREATE TABLE `discipline` (
  `id` INT PRIMARY KEY,
  `dis_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `type_disc` (
  `id` INT PRIMARY KEY,
  `type_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `teacher` (
  `id` INT PRIMARY KEY,
  `full_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `auditorium` (
  `id` INT PRIMARY KEY,
  `auditorium_number` VARCHAR(10) NOT NULL
);

CREATE TABLE `schedule` (
  `id` INT PRIMARY KEY,
  `discipline_id` INT NOT NULL,
  `type_disc_id` INT NOT NULL,
  `teacher_id` INT NOT NULL,
  `auditorium_id` INT NOT NULL,
  `semester_id` INT NOT NULL,
  `group_id` INT NOT NULL
);

CREATE TABLE `semester` (
  `id` INT PRIMARY KEY,
  `semester_years` VARCHAR(50) NOT NULL
);

CREATE TABLE `course` (
  `id` INT PRIMARY KEY,
  `course_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `group` (
  `id` INT PRIMARY KEY,
  `number_group` VARCHAR(50) NOT NULL,
  `course_id` INT NOT NULL,
  `speciality_id` INT NOT NULL
);

CREATE TABLE `faculty` (
  `id` INT PRIMARY KEY,
  `faculty_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `speciality` (
  `id` INT PRIMARY KEY,
  `speciality_name` VARCHAR(50) NOT NULL,
  `faculty_id` INT NOT NULL
);

ALTER TABLE `group` ADD FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

ALTER TABLE `group` ADD FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`);

ALTER TABLE `speciality` ADD FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`);

ALTER TABLE `discipline` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`discipline_id`);

ALTER TABLE `group` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`group_id`);

ALTER TABLE `teacher` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`teacher_id`);

ALTER TABLE `auditorium` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`auditorium_id`);

ALTER TABLE `semester` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`semester_id`);

ALTER TABLE `type_disc` ADD FOREIGN KEY (`id`) REFERENCES `schedule` (`type_disc_id`);
