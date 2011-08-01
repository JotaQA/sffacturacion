CREATE TABLE activos_compuestos (codigoemp VARCHAR(50), descripcion TEXT NOT NULL, comentario TEXT NOT NULL, fecha DATETIME NOT NULL, PRIMARY KEY(codigoemp)) ENGINE = INNODB;
CREATE TABLE activos_simples (codigoemp VARCHAR(50), descripcion TEXT, comentario TEXT NOT NULL, compuesto INT NOT NULL, fecha_simple DATETIME NOT NULL, url_foto TEXT NOT NULL, detalle TEXT NOT NULL, estado_activo INT DEFAULT '1' NOT NULL, comentario_act_eli TEXT NOT NULL, peso_unitario FLOAT(18, 2) NOT NULL, unidades_por_caja_master INT NOT NULL, ancho FLOAT(18, 2) NOT NULL, largo FLOAT(18, 2) NOT NULL, alto FLOAT(18, 2) NOT NULL, en_promocion SMALLINT DEFAULT '0' NOT NULL, PRIMARY KEY(codigoemp)) ENGINE = INNODB;
CREATE TABLE boleta (id_boleta INT AUTO_INCREMENT, numero_boleta INT, fechaingreso_boleta DATETIME NOT NULL, fechaemision_boleta DATETIME, monto_boleta INT, id_notapedido_boleta INT, id_estadoboleta INT, rut_boleta CHAR(15), telefono_boleta CHAR(64), nombre_boleta TEXT, direccion_boleta TEXT, comuna_boleta TEXT, ciudad_boleta TEXT, giro_boleta TEXT, oc_boleta TEXT, condicionpago_boleta TEXT, comentario_boleta TEXT, responsable_boleta TEXT, INDEX id_estadoboleta_idx (id_estadoboleta), PRIMARY KEY(id_boleta)) ENGINE = INNODB;
CREATE TABLE categorias (id_categoria INT AUTO_INCREMENT, descripcion_categoria VARCHAR(100) NOT NULL, PRIMARY KEY(id_categoria)) ENGINE = INNODB;
CREATE TABLE cliente (id_cliente INT AUTO_INCREMENT, rut_cliente VARCHAR(50) NOT NULL, nombre_cliente VARCHAR(100) NOT NULL, descripcion_cliente TEXT NOT NULL, giro TEXT NOT NULL, tipo_pago INT NOT NULL, c_pago VARCHAR(255) NOT NULL, tipo INT NOT NULL, id_division INT NOT NULL, id_vendedor INT NOT NULL, estado_cliente INT NOT NULL, comentario_cli_eli TEXT NOT NULL, fecha_cliente DATETIME NOT NULL, credito_cliente FLOAT(18, 2) DEFAULT 0 NOT NULL, id_empresa INT, PRIMARY KEY(id_cliente)) ENGINE = INNODB;
CREATE TABLE cliente_historial (id_cliente_historial BIGINT UNSIGNED AUTO_INCREMENT, rut VARCHAR(11) NOT NULL, usuario VARCHAR(50) NOT NULL, dato TEXT NOT NULL, fecha_modificacion DATETIME NOT NULL, PRIMARY KEY(id_cliente_historial)) ENGINE = INNODB;
CREATE TABLE compuesto_simple (id_compuesto_simple INT AUTO_INCREMENT, id_compuesto TEXT NOT NULL, id_simple TEXT NOT NULL, cantidad INT NOT NULL, fecha_compuesto DATETIME NOT NULL, PRIMARY KEY(id_compuesto_simple)) ENGINE = INNODB;
CREATE TABLE comunas (id_comunas INT AUTO_INCREMENT, descripcion VARCHAR(255) NOT NULL, relacion INT NOT NULL, PRIMARY KEY(id_comunas)) ENGINE = INNODB;
CREATE TABLE costos (id_costo INT AUTO_INCREMENT, id_prod_costo VARCHAR(15) NOT NULL, descripcion_costo VARCHAR(100) NOT NULL, cost_imp FLOAT(18, 2) DEFAULT 0 NOT NULL, cost_nac FLOAT(18, 2) DEFAULT 0 NOT NULL, codigo_madre TEXT NOT NULL, PRIMARY KEY(id_costo)) ENGINE = INNODB;
CREATE TABLE cotizaciones (id_cotizacion INT AUTO_INCREMENT, rut_cliente VARCHAR(10) NOT NULL, obra VARCHAR(100) NOT NULL, contacto VARCHAR(100) NOT NULL, rut_contacto VARCHAR(10) NOT NULL, telefono_contacto VARCHAR(12) NOT NULL, correo_contacto VARCHAR(30) NOT NULL, fecha_ingreso DATETIME NOT NULL, fecha_emision DATETIME NOT NULL, fecha_estimada_cierre DATE NOT NULL, validez VARCHAR(30) NOT NULL, total_neto INT DEFAULT '0' NOT NULL, descuento_a_total INT DEFAULT '0' NOT NULL, enviado INT DEFAULT '0' NOT NULL, id_vendedor INT NOT NULL, id_empresa INT NOT NULL, estado INT NOT NULL, comentario TEXT NOT NULL, comentario_ventas TEXT NOT NULL, comentario_vendedor TEXT NOT NULL, PRIMARY KEY(id_cotizacion)) ENGINE = INNODB;
CREATE TABLE cotizaciones_estado (id INT, descripcion VARCHAR(100) NOT NULL, visto_por_vendedor INT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cotizaciones_piezas (id INT AUTO_INCREMENT, id_cotizaciones_producto INT NOT NULL, id_pieza VARCHAR(30) NOT NULL, cantidad INT NOT NULL, es_extra INT NOT NULL, precio_pieza INT NOT NULL, nota_pieza TEXT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cotizaciones_producto (id INT AUTO_INCREMENT, id_cotizacion INT NOT NULL, id_producto VARCHAR(30) NOT NULL, cantidad INT NOT NULL, precio INT NOT NULL, descuento INT NOT NULL, nombre VARCHAR(30) NOT NULL, detalle_tecnico VARCHAR(100) NOT NULL, comentario VARCHAR(200) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE cuota (id_cuota INT AUTO_INCREMENT, id_factura INT, id_estado_cuota INT NOT NULL, monto_cuota INT NOT NULL, montopagado_cuota INT, fechavencimiento_cuota DATETIME, accion_cuota VARCHAR(100), comentario_cuota TEXT, INDEX id_estado_cuota_idx (id_estado_cuota), INDEX id_factura_idx (id_factura), PRIMARY KEY(id_cuota)) ENGINE = INNODB;
CREATE TABLE despacho (id_despacho INT AUTO_INCREMENT, id_chofer INT NOT NULL, id_vehiculo INT NOT NULL, fecha_estimada DATETIME NOT NULL, estado INT NOT NULL, comentario TEXT, fecha_creacion DATETIME NOT NULL, bultos INT DEFAULT '0' NOT NULL, PRIMARY KEY(id_despacho)) ENGINE = INNODB;
CREATE TABLE detalle_activo (id_detalle_activo INT AUTO_INCREMENT, id_boleta INT, id_factura INT, id_guia INT, id_nota_credito INT, id_nota_debito INT, id_salida INT, id_salida_ac INT, codigointerno_detalle_activo CHAR(64), codigoexterno_detalle_activo CHAR(64), cantidad_detalle_activo INT, precio_detalle_activo INT, fechaingreso_detalle_activo DATETIME, id_producto CHAR(50), descripcioninterna_detalle_activo TEXT, descripcionexterna_detalle_activo TEXT, INDEX id_nota_credito_idx (id_nota_credito), INDEX id_nota_debito_idx (id_nota_debito), INDEX id_guia_idx (id_guia), INDEX id_boleta_idx (id_boleta), INDEX id_factura_idx (id_factura), PRIMARY KEY(id_detalle_activo)) ENGINE = INNODB;
CREATE TABLE division (id_division INT AUTO_INCREMENT, nombre_division VARCHAR(200), descripcion_division VARCHAR(64), PRIMARY KEY(id_division)) ENGINE = INNODB;
CREATE TABLE divisiones (id_division INT AUTO_INCREMENT, descripcion_division VARCHAR(50) NOT NULL, PRIMARY KEY(id_division)) ENGINE = INNODB;
CREATE TABLE empresa (id_empresa INT AUTO_INCREMENT, nombre_empresa VARCHAR(100) NOT NULL, rut_empresa VARCHAR(13) NOT NULL, razon_social TEXT NOT NULL, rubro TEXT NOT NULL, descripcion_empresa TEXT NOT NULL, direccion VARCHAR(100) NOT NULL, comuna VARCHAR(30) NOT NULL, ciudad VARCHAR(30) NOT NULL, telefono VARCHAR(30) NOT NULL, website VARCHAR(30) NOT NULL, logo VARCHAR(30) NOT NULL, PRIMARY KEY(id_empresa)) ENGINE = INNODB;
CREATE TABLE espacio (id_espacio INT AUTO_INCREMENT, id_pasillo INT NOT NULL, codigo_espacio CHAR(15) NOT NULL, descripcion_espacio VARCHAR(50), INDEX id_pasillo_idx (id_pasillo), PRIMARY KEY(id_espacio)) ENGINE = INNODB;
CREATE TABLE estado (id_estado INT, nombre_estado TEXT NOT NULL, descripcion_estado TEXT NOT NULL, PRIMARY KEY(id_estado)) ENGINE = INNODB;
CREATE TABLE estado_boleta (id_estadoboleta INT AUTO_INCREMENT, nombre_estadoboleta VARCHAR(200), descripcion_estadoboleta TEXT, PRIMARY KEY(id_estadoboleta)) ENGINE = INNODB;
CREATE TABLE estado_componente (id_estado INT AUTO_INCREMENT, nombre_estado TEXT NOT NULL, descripcion_estado TEXT NOT NULL, PRIMARY KEY(id_estado)) ENGINE = INNODB;
CREATE TABLE estado_cuota (id_estado_cuota INT AUTO_INCREMENT, nombre_estado_cuota VARCHAR(200), descripcion_estado_cuota TEXT, PRIMARY KEY(id_estado_cuota)) ENGINE = INNODB;
CREATE TABLE estado_factura (id_estadofactura INT AUTO_INCREMENT, nombre_estadofactura VARCHAR(200), descripcion_estadofactura TEXT, PRIMARY KEY(id_estadofactura)) ENGINE = INNODB;
CREATE TABLE estado_guia (id_estadoguia INT AUTO_INCREMENT, nombre_estadoguia VARCHAR(200), descripcion_estadoguia TEXT, PRIMARY KEY(id_estadoguia)) ENGINE = INNODB;
CREATE TABLE estado_nota_credito (id_estado_nota_credito INT AUTO_INCREMENT, nombre_estado_nota_credito VARCHAR(200), descripcion_estado_nota_credito TEXT, PRIMARY KEY(id_estado_nota_credito)) ENGINE = INNODB;
CREATE TABLE estado_nota_debito (id_estado_nota_debito INT AUTO_INCREMENT, nombre_estado_nota_debito VARCHAR(200), descripcion_estado_nota_debito TEXT, PRIMARY KEY(id_estado_nota_debito)) ENGINE = INNODB;
CREATE TABLE existencia (id_existencia INT AUTO_INCREMENT, id_espacio INT NOT NULL, codigo_existencia CHAR(15) NOT NULL, cantidad_existencia INT NOT NULL, comentario_existencia VARCHAR(200), fecha_existencia DATETIME NOT NULL, INDEX id_espacio_idx (id_espacio), PRIMARY KEY(id_existencia)) ENGINE = INNODB;
CREATE TABLE factura (id_factura INT AUTO_INCREMENT, id_estadofactura INT, id_division INT, numero_factura INT NOT NULL, fechaingreso_factura DATETIME, fechaemision_factura DATETIME, monto_factura INT, saldo_factura INT, descuento_factura FLOAT(18, 2) DEFAULT 0 NOT NULL, id_notapedido_factura INT, rut_factura CHAR(15), telefono_factura CHAR(32), nombre_factura TEXT, direccion_factura TEXT, comuna_factura TEXT, ciudad_factura TEXT, giro_factura TEXT, oc_factura TEXT, condicionpago_factura TEXT, responsable_factura TEXT, responsable2_factura TEXT, pctje_comision_factura INT, creador_factura CHAR(64) NOT NULL, emisor_factura CHAR(64), anulador_factura CHAR(64), comentario_factura TEXT, tipo_factura CHAR(64) DEFAULT 'FISICA' NOT NULL, INDEX id_division_idx (id_division), INDEX id_estadofactura_idx (id_estadofactura), PRIMARY KEY(id_factura)) ENGINE = INNODB;
CREATE TABLE formas_pago (id_pago INT AUTO_INCREMENT, descripcion_pago VARCHAR(255) NOT NULL, vencimiento INT NOT NULL, PRIMARY KEY(id_pago)) ENGINE = INNODB;
CREATE TABLE guia (id_guia INT AUTO_INCREMENT, id_estadoguia INT, id_factura INT, numero_guia INT, id_notapedido_guia TEXT, fechaingreso_guia DATETIME, fechaemision_guia DATETIME, rut_guia CHAR(15), telefono_guia CHAR(32), nombre_guia TEXT, direccion_guia TEXT, comuna_guia TEXT, ciudad_guia TEXT, giro_guia TEXT, oc_guia TEXT, condicionpago_guia TEXT, comentario_guia TEXT, responsable_guia TEXT, tipo_guia CHAR(127), INDEX id_factura_idx (id_factura), INDEX id_estadoguia_idx (id_estadoguia), PRIMARY KEY(id_guia)) ENGINE = INNODB;
CREATE TABLE hist_cuota (id_hist_cuota INT AUTO_INCREMENT, id_factura INT, monto_hist_cuota INT, montopagado_hist_cuota INT, fechavencimiento_hist_cuota DATETIME, comentario_hist_cuota TEXT, estado_hist_cuota TEXT, INDEX id_factura_idx (id_factura), PRIMARY KEY(id_hist_cuota)) ENGINE = INNODB;
CREATE TABLE hist_pago (id_hist_pago INT AUTO_INCREMENT, id_hist_cuota INT, fecha_hist_pago DATETIME, monto_hist_pago INT, tipopago_tipo_pago CHAR(50), INDEX id_hist_cuota_idx (id_hist_cuota), PRIMARY KEY(id_hist_pago)) ENGINE = INNODB;
CREATE TABLE info_contactos (id_persona INT AUTO_INCREMENT, nombre_completo TEXT NOT NULL, apellido TEXT NOT NULL, rut VARCHAR(50) NOT NULL, correo TEXT NOT NULL, celular VARCHAR(50) NOT NULL, fono_casa VARCHAR(50) NOT NULL, fecha_nacimiento DATE NOT NULL, id_vendedor INT NOT NULL, PRIMARY KEY(id_persona)) ENGINE = INNODB;
CREATE TABLE log (id_usuario INT, id_salida INT, fecha DATETIME, campo_mod VARCHAR(100) NOT NULL, valor_antiguo TEXT NOT NULL, valor_nuevo TEXT NOT NULL, PRIMARY KEY(id_usuario, id_salida, fecha)) ENGINE = INNODB;
CREATE TABLE nivel (id_nivel INT AUTO_INCREMENT, nombre_nivel VARCHAR(50) NOT NULL, numero_nivel INT NOT NULL, PRIMARY KEY(id_nivel)) ENGINE = INNODB;
CREATE TABLE nota_credito (id_nota_credito INT AUTO_INCREMENT, id_estado_nota_credito INT, codref_nota_credito TINYINT NOT NULL COMMENT '1: Anula Documento de Referencia, 2: Corrige Texto Documento de Referencia, 3: Corrige Montos', numero_nota_credito INT NOT NULL, numero_refdocumento_nota_credito VARCHAR(128), fechaingreso_nota_credito DATETIME, fechaemision_nota_credito DATETIME, neto_nota_credito INT, total_nota_credito INT, descuento_nota_credito FLOAT(18, 2) DEFAULT 0 NOT NULL, id_notapedido_nota_credito INT, razon_nota_credito VARCHAR(90), glosa_nota_credito VARCHAR(80), rut_nota_credito CHAR(15), telefono_nota_credito CHAR(32), nombre_nota_credito VARCHAR(200), direccion_nota_credito TEXT, comuna_nota_credito TEXT, ciudad_nota_credito TEXT, giro_nota_credito TEXT, oc_nota_credito TEXT, condicionpago_nota_credito TEXT, responsable_nota_credito TEXT, comentarior_nota_credito TEXT, tipo_nota_credito CHAR(64) DEFAULT 'FISICA' NOT NULL, INDEX id_estado_nota_credito_idx (id_estado_nota_credito), PRIMARY KEY(id_nota_credito)) ENGINE = INNODB;
CREATE TABLE nota_debito (id_nota_debito INT AUTO_INCREMENT, id_estado_nota_debito INT, codref_nota_debito TINYINT NOT NULL COMMENT '1: Anula Documento de Referencia, 2: Corrige Texto Documento de Referencia, 3: Corrige Montos', numero_nota_debito INT NOT NULL, numero_refdocumento_nota_debito VARCHAR(128), fechaingreso_nota_debito DATETIME, fechaemision_nota_debito DATETIME, neto_nota_debito INT, total_nota_debito INT, descuento_nota_debito FLOAT(18, 2) DEFAULT 0 NOT NULL, id_notapedido_nota_debito INT, razon_nota_debito VARCHAR(90), glosa_nota_debito VARCHAR(80), rut_nota_debito CHAR(15), telefono_nota_debito CHAR(32), nombre_nota_debito VARCHAR(200), direccion_nota_debito TEXT, comuna_nota_debito TEXT, ciudad_nota_debito TEXT, giro_nota_debito TEXT, oc_nota_debito TEXT, condicionpago_nota_debito TEXT, responsable_nota_debito TEXT, comentarior_nota_debito TEXT, tipo_nota_debito CHAR(64) DEFAULT 'FISICA' NOT NULL, INDEX id_estado_nota_debito_idx (id_estado_nota_debito), PRIMARY KEY(id_nota_debito)) ENGINE = INNODB;
CREATE TABLE nota_venta (id_compra INT AUTO_INCREMENT, id_proveedor INT NOT NULL, id_nota_compra INT NOT NULL, id_comprador INT NOT NULL, fecha_nota DATETIME NOT NULL, PRIMARY KEY(id_compra)) ENGINE = INNODB;
CREATE TABLE pago (id_pago INT AUTO_INCREMENT, id_cuota INT NOT NULL, id_tipo_pago INT NOT NULL, fecha_pago DATETIME NOT NULL, monto_pago INT NOT NULL, INDEX id_cuota_idx (id_cuota), INDEX id_tipo_pago_idx (id_tipo_pago), PRIMARY KEY(id_pago)) ENGINE = INNODB;
CREATE TABLE parametro (id_parametro INT AUTO_INCREMENT, valor_parametro FLOAT(18, 2) NOT NULL, nombre_parametro TEXT NOT NULL, descripcion_parametro TEXT NOT NULL, PRIMARY KEY(id_parametro)) ENGINE = INNODB;
CREATE TABLE parametro_factura (id BIGINT AUTO_INCREMENT, campo TEXT NOT NULL, x INT NOT NULL, y INT NOT NULL, tam_letra INT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE parametro_guia (id BIGINT AUTO_INCREMENT, campo TEXT NOT NULL, x INT NOT NULL, y INT NOT NULL, tam_letra INT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE pasillo (id_pasillo INT AUTO_INCREMENT, id_nivel INT NOT NULL, codigo_pasillo CHAR(15) NOT NULL, descripcion_pasillo VARCHAR(50), INDEX id_nivel_idx (id_nivel), PRIMARY KEY(id_pasillo)) ENGINE = INNODB;
CREATE TABLE provincias (id_comunas INT AUTO_INCREMENT, descripcion VARCHAR(255) NOT NULL, relacion INT NOT NULL, PRIMARY KEY(id_comunas)) ENGINE = INNODB;
CREATE TABLE referencia_detalle (id_detalle_activo1 INT, id_detalle_activo2 INT, PRIMARY KEY(id_detalle_activo1, id_detalle_activo2)) ENGINE = INNODB;
CREATE TABLE referencia_documento (id_referencia_documento INT AUTO_INCREMENT, id_factura INT, id_guia INT, id_boleta INT, id_nota_credito INT, id_nota_debito INT, documento_final TINYINT COMMENT '1: Factura, 2: Guia, 3: Boleta, 4: NC, 5: ND', INDEX id_factura_idx (id_factura), INDEX id_guia_idx (id_guia), INDEX id_boleta_idx (id_boleta), INDEX id_nota_credito_idx (id_nota_credito), INDEX id_nota_debito_idx (id_nota_debito), PRIMARY KEY(id_referencia_documento)) ENGINE = INNODB;
CREATE TABLE regiones (id_regiones INT AUTO_INCREMENT, descripcion VARCHAR(255) NOT NULL, relacion VARCHAR(11) NOT NULL, PRIMARY KEY(id_regiones)) ENGINE = INNODB;
CREATE TABLE salida (id_salida INT AUTO_INCREMENT, id_cliente VARCHAR(50) NOT NULL, id_responsable VARCHAR(50) NOT NULL, id_responsable2 VARCHAR(50) NOT NULL, porcentaje INT DEFAULT '0' NOT NULL, id_division INT NOT NULL, id_sucursal VARCHAR(50) NOT NULL, fecha DATE NOT NULL, fecha_ingreso DATETIME NOT NULL, comentario TEXT NOT NULL, estado INT NOT NULL, fecha_salida DATETIME NOT NULL, orden_compra VARCHAR(20) NOT NULL, observacion TEXT NOT NULL, url_orden_compra TEXT NOT NULL, condicion_pago INT DEFAULT '1' NOT NULL, neto INT DEFAULT '0' NOT NULL, es_muestra INT DEFAULT '0' NOT NULL, descuento_salida FLOAT(18, 2) DEFAULT 0 NOT NULL, ingresado_por VARCHAR(50) NOT NULL, fecha_sugerida DATE NOT NULL, anulador INT NOT NULL, id_empresa INT NOT NULL, comentario_finanzas TEXT NOT NULL, comentario_bodega TEXT NOT NULL, transporte TEXT NOT NULL, fecha_comercial DATETIME NOT NULL, fecha_finanzas DATETIME NOT NULL, neto_aprobado INT DEFAULT '0' NOT NULL, PRIMARY KEY(id_salida)) ENGINE = INNODB;
CREATE TABLE salida_activo (id_salida_ac INT AUTO_INCREMENT, id_salida VARCHAR(50) NOT NULL, id_prod TEXT NOT NULL, cantidad INT NOT NULL, precio INT NOT NULL, descuento FLOAT(18, 2) NOT NULL, estado VARCHAR(20) DEFAULT '11' NOT NULL, parcializado_de INT NOT NULL, requiere_permiso INT DEFAULT '0' NOT NULL, fecha_sal_act DATETIME NOT NULL, nacional INT DEFAULT '0' NOT NULL, faltan INT DEFAULT '0' NOT NULL, comp_editada INT DEFAULT '0' NOT NULL, fecha_modif DATETIME NOT NULL, comentario_bodega TEXT NOT NULL, id_factura INT NOT NULL, factura INT DEFAULT '0' NOT NULL, id_guia INT DEFAULT '0' NOT NULL, guia INT DEFAULT '0' NOT NULL, id_boleta INT DEFAULT '0' NOT NULL, boleta INT DEFAULT '0' NOT NULL, despacho VARCHAR(100) DEFAULT 'N' NOT NULL, facturado TINYINT DEFAULT '0' NOT NULL, PRIMARY KEY(id_salida_ac)) ENGINE = INNODB;
CREATE TABLE stock (id_stock INT AUTO_INCREMENT, tipo INT NOT NULL, id_activo VARCHAR(50) NOT NULL, stock_actual INT NOT NULL, por_despachar INT NOT NULL, stock_reservado INT NOT NULL, faltan INT NOT NULL, precio_lista INT DEFAULT '1' NOT NULL, fecha_precio DATETIME NOT NULL, descuento FLOAT(18, 2) NOT NULL, fecha_descuento DATETIME NOT NULL, seguridad INT DEFAULT '0' NOT NULL, promedio INT DEFAULT '0' NOT NULL, comentario_stock TEXT NOT NULL, PRIMARY KEY(id_stock)) ENGINE = INNODB;
CREATE TABLE sucursal (id_sucursal INT AUTO_INCREMENT, id_cliente VARCHAR(50) NOT NULL, direccion_sucur VARCHAR(255) NOT NULL, comuna_sucur VARCHAR(255) NOT NULL, ciudad_sucur VARCHAR(255) NOT NULL, region_sucur VARCHAR(255) NOT NULL, casa_matriz INT NOT NULL, telefono1_sucur VARCHAR(50) NOT NULL, telefono2_sucur VARCHAR(50) NOT NULL, fax_sucur VARCHAR(255) NOT NULL, contacto_sucur VARCHAR(255) NOT NULL, correo_sucursal TEXT NOT NULL, fecha_sucur DATETIME NOT NULL, PRIMARY KEY(id_sucursal)) ENGINE = INNODB;
CREATE TABLE tipo_pago (id_tipo_pago INT AUTO_INCREMENT, nombre_tipo_pago CHAR(50) NOT NULL, descripcion_tipo_pago TEXT, PRIMARY KEY(id_tipo_pago)) ENGINE = INNODB;
CREATE TABLE transacciones (id_transaccion INT AUTO_INCREMENT, id_prod VARCHAR(50) NOT NULL, cantidad INT NOT NULL, accion TEXT NOT NULL, fecha DATETIME NOT NULL, PRIMARY KEY(id_transaccion)) ENGINE = INNODB;
CREATE TABLE usuarios (id_usuario INT AUTO_INCREMENT, nombre_usuario VARCHAR(200) NOT NULL, clave VARCHAR(10) NOT NULL, vendedor INT NOT NULL, permisos VARCHAR(255) NOT NULL, descripcion TEXT NOT NULL, telefono TEXT NOT NULL, movil TEXT NOT NULL, correo TEXT NOT NULL, fecha_usuario DATETIME NOT NULL, comi_imp FLOAT(18, 2) DEFAULT 0.04 NOT NULL, comi_nac FLOAT(18, 2) DEFAULT 0.02 NOT NULL, cargo VARCHAR(64) NOT NULL, funciones TEXT NOT NULL, depto TEXT NOT NULL, activo TINYINT DEFAULT '1' NOT NULL, PRIMARY KEY(id_usuario)) ENGINE = INNODB;
ALTER TABLE boleta ADD CONSTRAINT boleta_id_estadoboleta_estado_boleta_id_estadoboleta FOREIGN KEY (id_estadoboleta) REFERENCES estado_boleta(id_estadoboleta);
ALTER TABLE cuota ADD CONSTRAINT cuota_id_factura_factura_id_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura);
ALTER TABLE cuota ADD CONSTRAINT cuota_id_estado_cuota_estado_cuota_id_estado_cuota FOREIGN KEY (id_estado_cuota) REFERENCES estado_cuota(id_estado_cuota);
ALTER TABLE detalle_activo ADD CONSTRAINT detalle_activo_id_nota_debito_nota_debito_id_nota_debito FOREIGN KEY (id_nota_debito) REFERENCES nota_debito(id_nota_debito);
ALTER TABLE detalle_activo ADD CONSTRAINT detalle_activo_id_nota_credito_nota_credito_id_nota_credito FOREIGN KEY (id_nota_credito) REFERENCES nota_credito(id_nota_credito);
ALTER TABLE detalle_activo ADD CONSTRAINT detalle_activo_id_guia_guia_id_guia FOREIGN KEY (id_guia) REFERENCES guia(id_guia);
ALTER TABLE detalle_activo ADD CONSTRAINT detalle_activo_id_factura_factura_id_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura);
ALTER TABLE detalle_activo ADD CONSTRAINT detalle_activo_id_boleta_boleta_id_boleta FOREIGN KEY (id_boleta) REFERENCES boleta(id_boleta);
ALTER TABLE espacio ADD CONSTRAINT espacio_id_pasillo_pasillo_id_pasillo FOREIGN KEY (id_pasillo) REFERENCES pasillo(id_pasillo);
ALTER TABLE existencia ADD CONSTRAINT existencia_id_espacio_espacio_id_espacio FOREIGN KEY (id_espacio) REFERENCES espacio(id_espacio);
ALTER TABLE factura ADD CONSTRAINT factura_id_estadofactura_estado_factura_id_estadofactura FOREIGN KEY (id_estadofactura) REFERENCES estado_factura(id_estadofactura);
ALTER TABLE factura ADD CONSTRAINT factura_id_division_division_id_division FOREIGN KEY (id_division) REFERENCES division(id_division);
ALTER TABLE guia ADD CONSTRAINT guia_id_factura_factura_id_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura);
ALTER TABLE guia ADD CONSTRAINT guia_id_estadoguia_estado_guia_id_estadoguia FOREIGN KEY (id_estadoguia) REFERENCES estado_guia(id_estadoguia);
ALTER TABLE hist_cuota ADD CONSTRAINT hist_cuota_id_factura_factura_id_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura);
ALTER TABLE hist_pago ADD CONSTRAINT hist_pago_id_hist_cuota_hist_cuota_id_hist_cuota FOREIGN KEY (id_hist_cuota) REFERENCES hist_cuota(id_hist_cuota);
ALTER TABLE nota_credito ADD CONSTRAINT niei FOREIGN KEY (id_estado_nota_credito) REFERENCES estado_nota_credito(id_estado_nota_credito);
ALTER TABLE nota_debito ADD CONSTRAINT niei_1 FOREIGN KEY (id_estado_nota_debito) REFERENCES estado_nota_debito(id_estado_nota_debito);
ALTER TABLE pago ADD CONSTRAINT pago_id_tipo_pago_tipo_pago_id_tipo_pago FOREIGN KEY (id_tipo_pago) REFERENCES tipo_pago(id_tipo_pago);
ALTER TABLE pago ADD CONSTRAINT pago_id_cuota_cuota_id_cuota FOREIGN KEY (id_cuota) REFERENCES cuota(id_cuota);
ALTER TABLE pasillo ADD CONSTRAINT pasillo_id_nivel_nivel_id_nivel FOREIGN KEY (id_nivel) REFERENCES nivel(id_nivel);
ALTER TABLE referencia_detalle ADD CONSTRAINT ridi_1 FOREIGN KEY (id_detalle_activo2) REFERENCES detalle_activo(id_detalle_activo);
ALTER TABLE referencia_detalle ADD CONSTRAINT ridi FOREIGN KEY (id_detalle_activo1) REFERENCES detalle_activo(id_detalle_activo);
ALTER TABLE referencia_documento ADD CONSTRAINT rini FOREIGN KEY (id_nota_credito) REFERENCES nota_credito(id_nota_credito);
ALTER TABLE referencia_documento ADD CONSTRAINT referencia_documento_id_nota_debito_nota_debito_id_nota_debito FOREIGN KEY (id_nota_debito) REFERENCES nota_debito(id_nota_debito);
ALTER TABLE referencia_documento ADD CONSTRAINT referencia_documento_id_guia_guia_id_guia FOREIGN KEY (id_guia) REFERENCES guia(id_guia);
ALTER TABLE referencia_documento ADD CONSTRAINT referencia_documento_id_factura_factura_id_factura FOREIGN KEY (id_factura) REFERENCES factura(id_factura);
ALTER TABLE referencia_documento ADD CONSTRAINT referencia_documento_id_boleta_boleta_id_boleta FOREIGN KEY (id_boleta) REFERENCES boleta(id_boleta);
