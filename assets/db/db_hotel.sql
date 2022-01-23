CREATE DATABASE IF NOT EXISTS `db_hotel`;
USE `db_hotel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `idComprobante` int(11) NOT NULL,
  `idPago` int(11) NOT NULL,
  `tipoComprobante` varchar(45) NOT NULL,
  `numComprobante` varchar(45) NOT NULL,
  `fechaEmision` date NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `idHabitacion` int(11) NOT NULL,
  `Numero` varchar(45) NOT NULL,
  `Piso` varchar(45) NOT NULL,
  `Caracteristicas` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `TipoHabitacion` varchar(45) NOT NULL,
  `Precio` decimal(12,2) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `NEstado` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

CREATE TABLE `huesped` (
  `idHuesped` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `TipoDocumento` varchar(45) DEFAULT NULL,
  `NumDocumento` varchar(45) DEFAULT NULL,
  `Procedencia` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `NEstado` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL,
  `idReserva` int(11) NOT NULL,
  `igv` decimal(12,2) NOT NULL,
  `fechaPago` date NOT NULL,
  `totalPago` decimal(12,2) NOT NULL,
  `NEstado` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestotrabajo`
--

CREATE TABLE `puestotrabajo` (
  `idPuestoTrabajo` int(11) NOT NULL,
  `NombreP` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `idHabitacion` int(11) NOT NULL,
  `idHuesped` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaReserva` date NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `CostoAlojamiento` decimal(12,2) NOT NULL,
  `Observaciones` varchar(200) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  `NEstado` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idTrabajador` int(11) NOT NULL,
  `idPuestoTrabajo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `TipoDocumento` varchar(45) NOT NULL,
  `NumDocumento` varchar(45) NOT NULL,
  `Sueldo` decimal(12,2) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `NEstado` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idTrabajador` int(11) NOT NULL,
  `Acceso` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`idComprobante`),
  ADD KEY `fk_Comprobante_Pago_idx` (`idPago`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`idHabitacion`);

--
-- Indices de la tabla `huesped`
--
ALTER TABLE `huesped`
  ADD PRIMARY KEY (`idHuesped`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `fk_Pago_Reserva_idx` (`idReserva`);

--
-- Indices de la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  ADD PRIMARY KEY (`idPuestoTrabajo`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_Reserva_Habitacion_idx` (`idHabitacion`),
  ADD KEY `fk_Reserva_Huesped_idx` (`idHuesped`),
  ADD KEY `fk_Usuario_idx` (`idUsuario`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idTrabajador`),
  ADD KEY `fk_Trabajador_PuestoTrb_idx` (`idPuestoTrabajo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Trabajador_idx` (`idTrabajador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `idComprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `huesped`
--
ALTER TABLE `huesped`
  MODIFY `idHuesped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puestotrabajo`
--
ALTER TABLE `puestotrabajo`
  MODIFY `idPuestoTrabajo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idTrabajador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `fk_Comprobante_Pago` FOREIGN KEY (`idPago`) REFERENCES `pago` (`idPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_Pago_Reserva` FOREIGN KEY (`idReserva`) REFERENCES `reserva` (`idReserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_Reserva_Habitacion` FOREIGN KEY (`idHabitacion`) REFERENCES `habitacion` (`idHabitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_Huesped` FOREIGN KEY (`idHuesped`) REFERENCES `huesped` (`idHuesped`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `fk_Trabajador_PuestoTrb` FOREIGN KEY (`idPuestoTrabajo`) REFERENCES `puestotrabajo` (`idPuestoTrabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Trabajador` FOREIGN KEY (`idTrabajador`) REFERENCES `trabajador` (`idTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Volcado de datos para la tabla `puestotrabajo`
--

INSERT INTO `puestotrabajo` (`NombreP`, `Descripcion`) VALUES
('Recepcionista', NULL);

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`Numero`, `Piso`, `Caracteristicas`, `Descripcion`, `TipoHabitacion`, `Precio`, `Estado`, `NEstado`) VALUES
('101', '01', 'Ninguna', 'Ninguna', 'INDIVIDUAL', '40.00', 'OCUPADA', 1),
('102', '01', 'Habitación 2', 'Ninguna', 'DOBLE', '60.00', 'OCUPADA', 1),
('103', '01', 'Habitación 3', 'Ninguna', 'DOBLE', '60.00', 'OCUPADA', 1),
('103', '01', 'Habitación 3', 'Ninguna', 'MATRIMONIAL', '100.00', 'DISPONIBLE', 1);


--
-- Volcado de datos para la tabla `huesped`
--

INSERT INTO `huesped` (`Nombre`, `Apellidos`, `Email`, `Password`, `TipoDocumento`, `NumDocumento`, `Procedencia`, `Telefono`, `Estado`, `NEstado`) VALUES
('Marcus', 'Santana Cruz', 'santana_cruz@outlook.com', 'marcos1234', 'DNI', '98653241', 'Chachapoyas', '987654321', 'INACTIVO', 1),
('Bruce', 'Rojas Santillan', 'bruce_rojas@outlook.com', 'bruce12345', 'PASAPORTE', '02020202', 'Chachapoyas', '987654321', 'INACTIVO', 1),
('prueba', 'prueba', 'prueba@outlook.com', 'prueba', 'DNI', '98653241', 'Chachapoyas', '987654321', 'INACTIVO', 1),
('Rosario', 'Alma Gozo', 'rosario@gmail.com', '54321', 'OTROS', '56892395', 'Lima', '987654321', 'INACTIVO', 1),
('Ruben', 'Saldaña', 'ruben@gmail.com', '12345', 'DNI', '56892356', 'Chachapoyas', '987654321', 'INACTIVO', 1),
('Rosalía', 'Sánchez', 'rosalia@gmail.com', '12345', 'PASAPORTE', '78451245', 'Chachapoyas', '987654321', 'INACTIVO', 1),
('Samuel', 'Rojas', 'samuel@gmail.com', '123456', 'PASAPORTE', '9876546521', 'Chachapoyas', '987654321', 'INACTIVO', 1);


--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idPuestoTrabajo`, `Nombre`, `Apellidos`, `TipoDocumento`, `NumDocumento`, `Sueldo`, `Direccion`, `Telefono`, `Email`, `Estado`, `NEstado`) VALUES
(1, 'WebSite', 'vacio', 'vacio', '0', '0.00', 'vacio', '0', 'hotel.naranjo@gmail.com', 'ACTIVO', 1),
(1, 'Maria Rosa', 'Lopez Gomez', 'DNI', '45457821', '1500.00', 'Gran via', '987654321', 'example02@gmail.com', 'ACTIVO', 1),
(1, 'Manuela', 'Vergara Rioja', 'PASAPORTE', '56565656', '1500.00', 'La libertad', '985124124', 'manuel@hotmail.com', 'ACTIVO', 1),
(1, 'Juan', 'Gomez', 'DNI', '89564578', '2000.00', 'Chachapoyas', '987654322', 'juan@gmail.com', 'ACTIVO', 1),
(1, 'Rocio', 'Fernandez Rioja', 'PASAPORTE', '02154878', '2000.00', 'Chachapoyas', '987654322', 'rocio@gmail.com', 'ACTIVO', 1),
(1, 'Samuel', 'De Luque', 'DNI', '45124504', '2500.00', 'Barcelona', '963852741', 'samuel@outlook.com', 'ACTIVO', 1),
(1, 'Miriam', 'Rosa ', 'DNI', '45781245', '1500.00', 'Chachapoyas', '985623412', 'miriam@gmail.com', 'ACTIVO', 1);


--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idTrabajador`, `Acceso`, `Password`) VALUES
(1, 'Master', 'master123458'),
(3, 'Manuela', '12345'),
(4, 'Juan', '12345'),
(6, 'SamuelL', '12345');
