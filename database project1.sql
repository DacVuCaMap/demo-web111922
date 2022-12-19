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
	id char(10) primary key
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
	id char(10) primary key
    ,cus_id char(10) 
    ,ord_date datetime
    ,ord_status Enum('Complete', 'Pending', 'Cancel')
    ,ord_promotion double
    ,address varchar(500)
    ,FOREIGN KEY (cus_id) REFERENCES customers(id)
);

create table orderDetail(
	id int auto_increment primary key
    ,ord_id char(10) 
    ,pro_id char(8) 
    ,pro_price double 
    ,quantity int 
    ,FOREIGN KEY (ord_id) REFERENCES orders(id)
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
);

create table tblcart(
	id int auto_increment primary key
    ,ord_id char(10)
    ,cus_id char(10)
    ,pro_id char(8)
    ,pro_price double
    ,quantity int
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
    ,FOREIGN KEY (cus_id) REFERENCES customers(id)
    ,FOREIGN KEY (ord_id) REFERENCES orders(id)
);



