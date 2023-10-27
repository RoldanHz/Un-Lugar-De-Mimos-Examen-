<h5>
<br>-- Usar la base de datos para el proyecto "unlugardemimos"
<br>use unlugardemimos;
<br>
<br>-- Tabla "cliente"
<br>create table cliente (
<br>    id_cliente int auto_increment primary key not null,
<br>    nombre varchar(255) not null,
<br>    direccion varchar(255) null,
<br>    telefono varchar(15) not null,
<br>    correo_electronico varchar(255) null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null
<br>);
<br>
<br>-- Tabla "veterinario"
<br>create table veterinario (
<br>    id_veterinario int auto_increment primary key not null,
<br>    nombre varchar(255) not null,
<br>    direccion varchar(255) null,
<br>    telefono varchar(15) not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null
<br>);
<br>
<br>-- Tabla "especie"
<br>create table especie (
<br>    id_especie int auto_increment primary key not null,
<br>    nombre varchar(50) not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null
<br>);
<br>
<br>-- Tabla "raza"
<br>create table raza (
<br>    id_raza int auto_increment primary key not null,
<br>    nombre varchar(100) not null,
<br>    descripcion text null,
<br>    especie int not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (especie) references especie (id_especie)
<br>);
<br>
<br>-- Tabla "dieta"
<br>create table dieta (
<br>    id_dieta int auto_increment primary key not null,
<br>    nombre varchar(100) not null,
<br>    descripcion text null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null
<br>);
<br>
<br>-- Tabla "cuidados"
<br>create table cuidados (
<br>    id_cuidado int auto_increment primary key not null,
<br>    nombre varchar(100) not null,
<br>    descripcion text null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null
<br>);
<br>
<br>-- Tabla "mascota"
<br>create table mascota (
<br>    id_mascota int auto_increment primary key not null,
<br>    nombre varchar(255) not null,
<br>    especie int not null,
<br>    raza int not null,
<br>    edad int not null,
<br>    sexo varchar(10) not null,
<br>    dieta int not null,
<br>    descripcion text null,
<br>    foto varchar(255) null,
<br>    cuidado int not null,
<br>    estado_adopcion varchar(20) not null,
<br>    id_veterinario int null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (cuidado) references cuidados (id_cuidado),
<br>    foreign key (id_veterinario) references veterinario (id_veterinario),
<br>    foreign key (especie) references especie (id_especie),
<br>    foreign key (raza) references raza (id_raza),
<br>    foreign key (dieta) references dieta (id_dieta)
<br>);
<br>
<br>-- Tabla "evento de adopcion"
<br>create table evento_adopcion (
<br>    id_evento int auto_increment primary key not null,
<br>    id_mascota int not null,
<br>    id_cliente int not null,
<br>    descripcion text null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_mascota) references mascota (id_mascota),
<br>    foreign key (id_cliente) references cliente (id_cliente)
<br>);
<br>
<br>-- Tabla "donacion"
<br>create table donacion (
<br>    id_donacion int auto_increment primary key not null,
<br>    id_cliente int not null,
<br>    monto decimal(10, 2) not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_cliente) references cliente (id_cliente)
<br>);
<br>
<br>-- Tabla "comentarios"
<br>create table comentarios (
<br>    id_comentario int auto_increment primary key not null,
<br>    id_mascota int not null,
<br>    id_cliente int not null,
<br>    texto text not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_mascota) references mascota (id_mascota),
<br>    foreign key (id_cliente) references cliente (id_cliente)
<br>);
<br>
<br>-- Tabla "imagen_mascota"
<br>create table imagen_mascota (
<br>    id_imagen int auto_increment primary key not null,
<br>    id_mascota int not null,
<br>    url varchar(255) not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_mascota) references mascota (id_mascota)
<br>);
<br>
<br>-- Tabla "animal_dieta"
<br>create table animal_dieta (
<br>    id_animal_dieta int auto_increment primary key not null,
<br>    id_mascota int not null,
<br>    id_dieta int not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_mascota) references mascota (id_mascota),
<br>    foreign key (id_dieta) references dieta (id_dieta)
<br>);
<br>
<br>-- Tabla "animal_cuidado"
<br>create table animal_cuidado (
<br>    id_animal_cuidado int auto_increment primary key not null,
<br>    id_mascota int not null,
<br>    id_cuidado int not null,
<br>    created_at datetime not null,
<br>    updated_at datetime null,
<br>    deleted_at datetime null,
<br>    foreign key (id_mascota) references mascota (id_mascota),
<br>    foreign key (id_cuidado) references cuidados (id_cuidado)
<br>);
<br>
<br>
<br>
<br>-- Inserciones en la tabla "cliente"
<br>INSERT INTO cliente (nombre, direccion, telefono, correo_electronico, created_at)
<br>VALUES 
<br>    ('Juan Pérez', 'Calle Principal 123', '555-123-4567', 'juan@example.com', '2023-01-15 08:00:00'),
<br>    ('María López', 'Avenida Secundaria 456', '555-987-6543', 'maria@example.com', '2023-02-20 09:30:00');
<br>
<br>-- Inserciones en la tabla "veterinario"
<br>INSERT INTO veterinario (nombre, direccion, telefono, created_at)
<br>VALUES 
<br>    ('Ana Pérez', 'Calle de los Animales 789', '555-789-1234', '2023-03-10 10:45:00'),
<br>    ('Carlos Rodríguez', 'Avenida de las Mascotas 567', '555-567-8901', '2023-04-05 11:20:00');
<br>   
<br>INSERT INTO especie (nombre, created_at)
<br>VALUES 
<br>    ('Perro', '2023-07-08 14:55:00'),
<br>    ('Gato', '2023-08-19 15:25:00');
<br>   
<br>-- Inserciones en la tabla "raza"
<br>INSERT INTO raza (nombre, descripcion, especie, created_at)
<br>VALUES 
<br>    ('Labrador Retriever', 'Raza de perro cariñosa y juguetona', 1, '2023-05-12 12:10:00'),
<br>    ('Siames', 'Raza de gato elegante y vocal', 2, '2023-06-30 13:40:00');
<br>
<br>-- Inserciones en la tabla "especie"
<br>
<br>   
<br>-- Inserciones en la tabla "dieta"
<br>INSERT INTO dieta (nombre, descripcion, created_at)
<br>VALUES 
<br>    ('Dieta Premium para Perros', 'Alimento de alta calidad para perros', '2023-11-15 18:20:00'),
<br>    ('Dieta Saludable para Gatos', 'Comida equilibrada para gatos', '2023-12-02 19:05:00');
<br>    
<br>-- Inserciones en la tabla "cuidados"
<br>INSERT INTO cuidados (nombre, descripcion, created_at)
<br>VALUES 
<br>    ('Paseos diarios', 'Pasear al perro todos los días.', '2023-11-20 20:10:00'),
<br>    ('Cepillado regular', 'Cepillar al gato para mantener su pelaje saludable.', '2023-12-05 21:25:00');
<br>
<br>   -- Inserciones en la tabla "mascota"
<br>INSERT INTO mascota (nombre, especie, raza, edad, sexo, dieta, descripcion, foto, cuidado, estado_adopcion, id_veterinario, created_at)
<br>VALUES 
<br>    ('Max', 1, 1, 2, 'Macho', 1, 'Max es un perro juguetón y amigable.', 'max.jpg', 1, 'Disponible', 1, '2023-09-04 16:30:00'),
<br>    ('Luna', 2, 2, 1, 'Hembra', 2, 'Luna es una gata tranquila y cariñosa.', 'luna.jpg', 2, 'Disponible', 2, '2023-10-01 17:15:00');
<br>
<br>-- Inserciones en la tabla "evento_adopcion"
<br>INSERT INTO evento_adopcion (id_mascota, id_cliente, descripcion, created_at)
<br>VALUES 
<br>    (1, 1, 'Juan adoptó a Max', '2023-02-14 08:45:00'),
<br>    (2, 2, 'María adoptó a Luna', '2023-03-20 10:15:00');
<br>
<br>-- Inserciones en la tabla "donacion"
<br>INSERT INTO donacion (id_cliente, monto, created_at)
<br>VALUES 
<br>    (1, 100.00, '2023-04-05 14:30:00'),
<br>    (2, 50.00, '2023-05-15 16:20:00');
<br>
<br>-- Inserciones en la tabla "comentarios"
<br>INSERT INTO comentarios (id_mascota, id_cliente, texto, created_at)
<br>VALUES 
<br>    (1, 2, 'Max es adorable, ¿sigue disponible?', '2023-06-10 18:15:00'),
<br>    (2, 1, 'Luna es perfecta para mi familia, ¿cómo puedo adoptarla?', '2023-07-25 20:00:00');
<br>
<br>-- Inserciones en la tabla "imagen_mascota"
<br>INSERT INTO imagen_mascota (id_mascota, url, created_at)
<br>VALUES 
<br>    (1, 'max3.jpg', '2023-08-01 08:30:00'),
<br>    (1, 'max4.jpg', '2023-09-10 10:45:00'),
<br>    (2, 'luna3.jpg', '2023-10-15 12:20:00'),
<br>    (2, 'luna4.jpg', '2023-11-20 14:15:00');
<br>   
<br>-- Inserciones en la tabla "animal_dieta"
<br>INSERT INTO animal_dieta (id_mascota, id_dieta, created_at)
<br>VALUES 
<br>    (1, 1, '2023-08-10 10:30:00'),
<br>    (2, 2, '2023-09-15 12:15:00');
<br>
<br>-- Inserciones en la tabla "animal_cuidado"
<br>INSERT INTO animal_cuidado (id_mascota, id_cuidado, created_at)
<br>VALUES 
<br>    (1, 1, '2023-10-20 14:45:00'),
<br>    (2, 2, '2023-11-25 16:20:00');
<br>
<br>
<br>
</h5>