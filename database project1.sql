use shopbanhang;

create table admins(
	id int auto_increment primary key
    ,fullname nvarchar(200)
    ,email varchar(100) 
    ,password varchar(100) 
    ,phone char(15)
    ,remember_token varchar(100)
    ,create_at timestamp
);

create table customers(
	id int auto_increment primary key
	,fullname varchar(200)
    ,email varchar(100)
    ,password varchar(200)
    ,remember_token varchar(100)
    ,phone char(10)
    ,create_at datetime
    ,update_at timestamp 
);


create table category(
	id int auto_increment primary key
    ,name varchar(100) 
    ,parent_id int 
    ,create_at datetime 
    ,update_at timestamp
);


create table product(
	id char(8) primary key
    ,pro_name varchar(100) 
    ,pro_price double 
    ,cat_id int references  category(id)
    ,pro_quantity int 
    ,create_at datetime
    ,update_at timestamp
    ,foreign key (cat_id) references category(id)
);


create table prodesc(
	id int auto_increment primary key
    ,pro_id char(8) 
    ,size varchar(100)
    ,brand varchar(100)
    ,origin varchar(50)
    ,type varchar(50)
    ,diment varchar(50)
    ,descrip varchar(500)
    ,foreign key (pro_id) references product(id)
);

create table proimage(
	id int auto_increment primary key
    ,pro_id char(8) 
    ,img_first varchar(100)
    ,img_second varchar(100)
    ,img_third varchar(100)
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
);


create table orders(
	id varchar(36) primary key
    ,cus_id int 
    ,ord_date datetime
    ,ord_status Enum('Complete', 'Pending', 'Cancel')
    ,address varchar(500)
    ,ord_promotion double
    ,FOREIGN KEY (cus_id) REFERENCES customers(id)
);


create table orderDetail(
	id int auto_increment primary key
    ,ord_id varchar(36) 
    ,pro_id char(8) 
    ,pro_price double 
    ,quantity int 
    ,FOREIGN KEY (ord_id) REFERENCES orders(id)
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
);

create table tblcart(
	id int auto_increment primary key
    ,ord_id varchar(36)
    ,cus_id int
    ,pro_id char(8)
    ,pro_price double
    ,quantity int
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
    ,FOREIGN KEY (cus_id) REFERENCES customers(id)
    ,FOREIGN KEY (ord_id) REFERENCES orders(id)
);



alter table product
add pro_status enum('stocking', 'Out of stock');
alter table orders 
modify methodpay enum('Transfer','Cash');


DROP TRIGGER IF EXISTS insert_orderDetail;
DELIMITER $$
CREATE TRIGGER insert_orderDetail AFTER INSERT ON orderDetail for each row 
BEGIN
	UPDATE product
	SET pro_quantity = pro_quantity - new.quantity where id = new.pro_id;
END
$$


DROP TRIGGER IF EXISTS update_orders;
DELIMITER $$
CREATE TRIGGER update_orders after UPDATE ON orders for each row 
BEGIN
	update product inner join orderDetail on orderDetail.ord_id = new.id set pro_quantity = pro_quantity + orderDetail.quantity where product.id = orderDetail.pro_id && new.ord_status = 3;
END
$$


DROP TRIGGER IF EXISTS update_product;
DELIMITER $$
CREATE TRIGGER update_product before update ON product for each row
begin
	if new.pro_quantity>0 then
	set new.pro_status = 1;
    else
    set new.pro_status = 2;
    end if;
end
$$



