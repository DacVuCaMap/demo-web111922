use shopbanhang;

create table adminUsers(
	id int auto_increment primary key
    ,email varchar(100) not null
    ,password varchar(100) not null
    ,remember_token varchar(100)
);

create table customers(
	id int auto_increment primary key
	,fullname varchar(200)
    ,address varchar(500)
    ,phone char(10)
    ,create_at timestamp
    ,update_at datetime 
);

create table users(
	id int auto_increment primary key
    ,username varchar(100) not null
    ,password varchar(100) not null
    ,remember_token varchar(100)
    ,create_at timestamp
);
 drop table prodesc;
create table category(
	id int auto_increment primary key
    ,name varchar(100) not null
    ,parent_id int 
    ,create_at timestamp 
    ,update_at datetime
);

create table product(
	id char(8) primary key
    ,pro_name varchar(100) not null
    ,pro_price float not null
    ,cat_id int references category(id)
    ,pro_quantity int not null
    ,create_at timestamp
    ,update_at datetime
);

create table prodesc(
	id int auto_increment primary key
    ,pro_id char(8) references product(id)
    ,size varchar(100)
    ,brand varchar(100)
    ,origin varchar(50)
    ,type varchar(50)
    ,diment varchar(50)
    ,descrip varchar(500)
);

create table proimage(
	id int auto_increment primary key
    ,pro_id char(8) references product(id)
    ,img_first varchar(100)
    ,img_second varchar(100)
    ,img_third varchar(100)
);

create table orders(
	id int auto_increment primary key
    ,cus_id int references customers(id)
    ,ord_date timestamp
    ,ord_series varchar(20)
    ,ord_promotion float
);

create table orderDetail(
	id int auto_increment primary key
    ,ord_id int references orders(id)
    ,pro_id char(5) references product(id)
    ,quantity int not null
);

insert into category(name)
values('Optical disc')
,('Floppy disk')
,('Hard Drive');

update category set parent_id = null where id = 1;

select * from product;
select * from prodesc;
select * from proimage;

select C.id, C.name, C.parent_id, C.create_at, C.update_at from category C where C.parent_id is null
union
SELECT B.id, B.name, A.name, B.create_at, B.update_at
FROM category A, category B
WHERE A.id = B.parent_id;

SELECT P.id, P.pro_name, C.name, P.pro_price, P.pro_quantity, I.img_first, C.parent_id from product P
inner join category C on C.id = P.cat_id
inner join proimage I on P.id = I.pro_id;


SELECT P.id, P.pro_name, P.cat_id, P.pro_price, P.pro_quantity, D.size, D.brand, D.origin, D.type, D.diment, D.descrip from product P
inner join prodesc D on P.id = D.pro_id ;



