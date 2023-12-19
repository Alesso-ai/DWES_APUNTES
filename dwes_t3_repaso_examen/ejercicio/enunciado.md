# DWES T3 Ejercicio de repaso
## Crear una base de datos
Crea una base de datos con el nombre dwes_t3_repaso.

Crea una tabla con el nombre clientes que contenga las siguientes columnas (todas VARCHAR).

- Nombre
- Email
- Teléfono
- Actividad

## Insertar los siguientes datos en la tabla desde phpMyAdmin

```sql
INSERT INTO clientes (nombre, email, telefono, actividad) VALUES
('Juan Pérez', 'juan.perez@example.com', '612345678', 'yoga'),
('Ana Gómez', 'ana.gomez@example.com', '623456789', 'spinning'),
('Luis Rodríguez', 'luis.rodriguez@example.com', '634567890', 'musculación'),
('Sofía Martín', 'sofia.martin@example.com', '645678901', 'crossfit'),
('Carlos López', 'carlos.lopez@example.com', '656789012', 'aeróbic'),
('María Fernández', 'maria.fernandez@example.com', '667890123', 'yoga'),
('David García', 'david.garcia@example.com', '678901234', 'spinning'),
('Laura Jiménez', 'laura.jimenez@example.com', '689012345', 'musculación'),
('Daniel Ruiz', 'daniel.ruiz@example.com', '690123456', 'crossfit'),
('Patricia Hernández', 'patricia.hernandez@example.com', '601234567', 'aeróbic'),
('Javier Martínez', 'javier.martinez@example.com', '612345670', 'yoga'),
('Sara González', 'sara.gonzalez@example.com', '623456781', 'spinning'),
('Francisco Sánchez', 'francisco.sanchez@example.com', '634567892', 'musculación'),
('Carmen Díaz', 'carmen.diaz@example.com', '645678903', 'crossfit'),
('Fernando Moreno', 'fernando.moreno@example.com', '656789014', 'aeróbic'),
('Isabel Muñoz', 'isabel.munoz@example.com', '667890125', 'yoga'),
('Miguel Álvarez', 'miguel.alvarez@example.com', '678901236', 'spinning'),
('Cristina Morales', 'cristina.morales@example.com', '689012347', 'musculación'),
('Antonio Ortiz', 'antonio.ortiz@example.com', '690123458', 'crossfit'),
('Lucía Iglesias', 'lucia.iglesias@example.com', '601234569', 'aeróbic');
```

## lista_clientes.php
Modifica el archivo para que liste los usuarios de una actvidad en concreto en función de la opción seleccionada en el menú desplegable.

## Cookies
La página deberá crear una cookie de 24h de duración que sea capaz de recordar qué opción del menú desplegable eligió el usuario en su última visita.

## registro_cliente.php