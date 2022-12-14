use shopbanhang;

create table admins(
	id int auto_increment primary key
    ,fullname nvarchar(200)
    ,email varchar(100) not null
    ,password varchar(100) not null
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
    ,address varchar(500)
    ,phone char(10)
    ,create_at datetime
    ,update_at timestamp 
);
alter table customers
modify id char(10);
alter table customers
modify create_at datetime;
alter table customers
modify update_at timestamp;



create table category(
	id int auto_increment primary key
    ,name varchar(100) not null
    ,parent_id int 
    ,create_at timestamp 
    ,update_at datetime
);
alter table category
modify create_at datetime;
alter table category
modify update_at timestamp;



create table product(
	id char(8) primary key
    ,pro_name varchar(100) not null
    ,pro_price float not null
    ,cat_id int references  category(id)
    ,pro_quantity int not null
    ,create_at timestamp
    ,update_at datetime
);
alter table product
modify create_at datetime;
alter table product
modify update_at timestamp;
ALTER TABLE product
ADD FOREIGN KEY (cat_id) REFERENCES category(id);


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
    ,ord_status Enum('complete', 'pending', 'cancel')
    ,ord_promotion float
    ,FOREIGN KEY (cus_id) REFERENCES customers(id)
);
alter table orders
modify id char(10);
alter table orders
modify ord_date datetime;


create table orderDetail(
	id int auto_increment primary key
    ,ord_id char(10) 
    ,pro_id char(8) 
    ,pro_price double Not null
    ,quantity int not null
    ,FOREIGN KEY (ord_id) REFERENCES orders(id)
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
);


create table sessions(
	id int auto_increment primary key
    ,dates datetime
    ,pro_id char(8)
    ,pro_price double
    ,quantity int
    ,FOREIGN KEY (pro_id) REFERENCES product(id)
);








-- select * from admins;

-- select * from proimage;
-- select * from category;
-- select * from product;
-- select * from customers;
-- select * from orders;
-- select * from orderDetail;

-- select sum(Od.pro_price*Od.quantity) as subtotal from orderDetail Od
-- inner join orders O on O.id = Od.ord_id
-- inner join customers C on C.id = O.cus_id
-- where O.id = 1;

-- select O.id, C.fullname, O.ord_date from orders O 
-- inner join customers C on C.id = O.cus_id;

-- select P.id, P.pro_name, C.name as category, sum(Od.pro_price*Od.quantity) as Doanhthu from product P
-- inner join orderDetail Od on P.id = Od.pro_id
-- inner join category C on P.cat_id = C.id
-- inner join orders O on Od.ord_id = O.id
--  where O.ord_status = 1 group by P.id desc;

-- select C.name as category, sum(Od.pro_price*Od.quantity) as Doanhthu from category C
-- inner join product P on P.cat_id = C.id
-- inner join orderDetail Od on P.id = Od.pro_id
-- inner join orders O on Od.ord_id = O.id
--  where O.ord_status = 1 group by C.id desc;
--  
-- select P.id, P.pro_name, C.name as category, sum(Od.quantity) as totalquantity from product P
-- inner join orderDetail Od on P.id = Od.pro_id
-- inner join category C on P.cat_id = C.id
-- inner join orders O on Od.ord_id = O.id
--  where O.ord_status = 1 group by P.id desc;
--  
--  SELECT C.id, C.name, C.parent_id, C.create_at, C.update_at from category C where C.parent_id = 0 AND C.name like '%SSD%'
--  union SELECT B.id, B.name, A.name, B.create_at, B.update_at FROM category A, category B WHERE A.id = B.parent_id AND B.name like '%SSD%';
--  
--  SELECT P.id, P.pro_name, C.name, P.pro_price, P.pro_quantity, P.create_at from product P
--         inner join category C on C.id = P.cat_id WHERE 1=1 and P.pro_name or P.id or C.name like '%SSD%';
--         
-- SELECT * FROM orders WHERE 1=1 and id LIKE '%OD001%';

-- SELECT O.id, C.fullname, O.ord_date, sum(Od.pro_price*Od.quantity) as total from orders O
-- inner join orderDetail Od on Od.ord_id = O.id
-- inner join customers C on C.id = O.cus_id
-- where  date_format(O.ord_date,'%Y-%m-%d') = '2022-12-11' group by O.id;

-- SELECT sum(Od.pro_price*Od.quantity) as subtotal from orders O
-- inner join orderDetail Od on Od.ord_id = O.id
-- where  date_format(O.ord_date,'%Y-%m-%d') = '2022-12-11';
--         
--         
-- select date_format(O.ord_date,'%d/%m/%Y') from orders O;