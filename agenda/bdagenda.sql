drop database  if  exists agenda ;
CREATE DATABASE agenda;
USE agenda;
drop table if  exists contacto;
CREATE TABLE contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100),
    apaterno VARCHAR(50),
    amaterno VARCHAR(50),
    genero ENUM('M', 'F') NOT NULL,
    fecha_nacimiento DATE,
    telefono VARCHAR(15),
    email VARCHAR(100),
    linkedin VARCHAR(100)
);

INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin) 
VALUES
('Laura', 'González', 'Ortiz', 'F', '1991-03-25', '123987456', 'laura.gonzalez@example.com', 'linkedin.com/in/lauragonzalez'),
('David', 'Hernández', 'Núñez', 'M', '1988-12-14', '789321654', 'david.hernandez@example.com', 'linkedin.com/in/davidhernandez'),
('Sofía', 'Mendoza', 'Vargas', 'F', '1993-06-09', '456789123', 'sofia.mendoza@example.com', 'linkedin.com/in/sofiamendoza'),
('Andrés', 'Pérez', 'Domínguez', 'M', '1990-01-30', '321987654', 'andres.perez@example.com', 'linkedin.com/in/andresperez'),
('Isabel', 'Castro', 'Ríos', 'F', '1986-09-12', '654321987', 'isabel.castro@example.com', 'linkedin.com/in/isabelcastro');

select * from contacto;


