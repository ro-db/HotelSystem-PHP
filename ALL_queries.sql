SET search_path = "HotelSystem";

CREATE TABLE hotel_chain ( hotel_chain_id INT PRIMARY KEY, 
						  number_of_hotels INT,
						  address VARCHAR,
						  phone_number CHAR(15),
						  email VARCHAR(50)
						 );
						 
CREATE TABLE hotel(hotel_id INT PRIMARY KEY,
				  hotel_chain_id INT,
				  number_of_rooms INT,
				  phone_number CHAR(15),
				  address VARCHAR,
				  email VARCHAR(50),
				  stars INT CONSTRAINT STARTS_CHECK check(stars >= 1 AND stars <= 5),
                  city VARCHAR,
				  FOREIGN KEY (hotel_chain_id) REFERENCES hotel_chain (hotel_chain_id)
				  );

CREATE TABLE room(room_number INT,
                  hotel_id INT,
				  price INT,
				  amenities TEXT,
				  capacity INT,
				  room_view TEXT,
				  extendable BOOLEAN, 
				  issues TEXT,
                  room_id INT PRIMARY KEY,
				  FOREIGN KEY (hotel_id) REFERENCES hotel (hotel_id)
				  );

CREATE TABLE employee(employee_id INT PRIMARY KEY,
					  full_name VARCHAR,
					  role_pos VARCHAR
					 );

CREATE TABLE customer(SIN_NUMBER INT PRIMARY KEY,
					  full_name VARCHAR,
					  address VARCHAR
					 );

CREATE TABLE booking (booking_id SERIAL PRIMARY KEY, 
					  SIN_NUMBER INT, 
					  room_id INT,
					  start_date  DATE,
                      end_date DATE,
					  FOREIGN KEY (SIN_NUMBER) REFERENCES customer (SIN_NUMBER),
					  FOREIGN KEY (room_id) REFERENCES room (room_id)
					 );

CREATE TABLE rental (rental_id SERIAL PRIMARY KEY,
					 SIN_NUMBER INT,
					 room_id INT,
					 start_date DATE,
					 end_date DATE,
					 price INT,
					 FOREIGN KEY (SIN_NUMBER) REFERENCES customer (SIN_NUMBER),
					 FOREIGN KEY (room_id) REFERENCES room (room_id)
					);

INSERT INTO hotel_chain (hotel_chain_id,number_of_hotels,email,address,phone_number) VALUES 
(1,5,'Johnathon77@example.com','3530 Braun Glens','958-253-0372                                      ')
,(2,5,'Benny12@example.com','65819 Lelah Junctions','463-310-7232                                      ')
,(3,5,'Lucas40@example.net','085 Sallie Wells','465-987-8336                                      ')
,(4,5,'Maynard72@example.org','5200 Walton Mountains','802-831-9423                                      ')
,(5,5,'Ryleigh90@example.net','487 McLaughlin Light','028-088-5567                                      ')
;
INSERT INTO hotel (hotel_id,hotel_chain_id,number_of_rooms,phone_number,address,email,stars,city) VALUES 
(3,1,7,'782-029-0375   ','6054 Camila Squares','Newton47@example.com',4,'North Manuela')
,(4,1,5,'132-037-2037   ','0922 Winfield Stravenue','Jewel32@example.org',5,'Hazelport')
,(1,1,7,'557-616-6988   ','713 Colby Street','Kristina43@example.net',4,'Port Lupehaven')
,(5,1,8,'983-013-2567   ','63835 Theodore Divide','Kris1@example.net',3,'Lazarotown')
,(7,2,7,'355-000-6697   ','09518 Sporer Summit','Dwight0@example.com',3,'Aylaview')
,(8,2,9,'105-866-7755   ','944 O''Kon Plains','Grover.Leffler@example.org',5,'West Alba')
,(9,2,6,'923-567-7338   ','14388 Rickie Vista','Raleigh57@example.com',4,'Merlehaven')
,(10,2,7,'038-146-2768   ','933 Malachi Circle','Keven_Kohler62@example.net',5,'North Kaylieshire')
,(12,3,5,'234-927-1668   ','208 Hilll Summit','Luigi_Bergstrom@example.com',3,'West Maggie')
,(13,3,5,'777-492-1219   ','782 Pfeffer Prairie','Erika.Purdy75@example.net',4,'Calebton')
;
INSERT INTO hotel (hotel_id,hotel_chain_id,number_of_rooms,phone_number,address,email,stars,city) VALUES 
(14,3,9,'372-485-4134   ','671 Leffler Ports','Maye62@example.net',5,'Port Candida')
,(15,3,7,'382-098-1822   ','50918 Mckenna Ridge','Lori24@example.net',3,'Koepphaven')
,(17,4,8,'417-964-5006   ','744 Rodrigo Orchard','Jevon73@example.org',3,'Lake Dock')
,(19,4,8,'771-852-2015   ','68453 Feil Turnpike','Merle9@example.org',5,'New Presley')
,(20,4,5,'235-195-0077   ','1538 Mohammad Shoals','Catharine.Kohler5@example.com',5,'North Lurlinebury')
,(21,5,9,'925-913-4298   ','88673 Holden Walks','Lempi30@example.net',3,'Zacharystad')
,(22,5,8,'108-698-0104   ','467 Blick Brooks','Lambert.Kovacek52@example.net',3,'North Ward')
,(23,5,7,'500-578-3720   ','6672 Nolan Springs','Idell.Gaylord91@example.net',3,'Russelmouth')
,(24,5,7,'980-689-4224   ','45639 Halvorson Stream','Eloisa_Carter59@example.net',5,'Walkerview')
,(25,5,6,'761-127-0783   ','97480 Dayana Points','Gabrielle_Reilly@example.org',5,'New Martinemouth')
;
INSERT INTO hotel (hotel_id,hotel_chain_id,number_of_rooms,phone_number,address,email,stars,city) VALUES 
(6,2,5,'444-074-9733   ','0505 Maybelle Cape','Darian_Terry82@example.net',4,'Hazelport')
,(2,1,6,'086-674-0295   ','165 Tremaine Summit','Vince59@example.net',5,'Danialstad')
,(11,3,6,'603-466-5671   ','6945 Ida Squares','Elisa19@example.net',4,'Russelmouth')
,(16,4,6,'913-823-6653   ','0602 Ardith Fords','Taya.Stehr56@example.org',4,'North Lurlinebury')
,(18,4,5,'463-002-0348   ','45680 Caleb Village','Donald80@example.org',5,'South Ward')
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,1,105,'Mouse',5,'at dolor non',false,'autem similique et',1)
,(2,1,107,'Shoes',4,'et illo deleniti',false,'maxime odio non',2)
,(3,1,105,'Cheese',5,'neque ut ad',false,'minima fugit consectetur',3)
,(1,2,107,'Shoes',5,'odio laboriosam dolorum',false,'similique aut vel',4)
,(2,2,104,'Car',3,'aut dolor sed',false,'laboriosam mollitia quas',5)
,(4,1,106,'Table',6,'rem quos quae',false,'rerum quisquam eius',6)
,(5,1,105,'Bacon',3,'in beatae saepe',false,'neque ullam aspernatur',7)
,(1,10,104,'Sausages',3,'sapiente placeat ipsam',false,'magnam quas laboriosam',8)
,(2,10,103,'Bacon',3,'ea quia ratione',false,'debitis placeat voluptas',9)
,(3,10,105,'Chips',4,'consectetur ipsa voluptatibus',false,'sit quidem id',10)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,11,105,'Hat',5,'nihil nobis voluptatem',false,'dolore nemo fugiat',11)
,(1,12,107,'Car',5,'adipisci minus dignissimos',false,'cum incidunt quasi',12)
,(2,12,103,'Computer',5,'enim temporibus dolores',false,'quia sint autem',13)
,(3,12,105,'Gloves',4,'eius minus ut',false,'nulla fugiat doloremque',14)
,(4,12,105,'Chicken',5,'aliquam amet ipsa',false,'illum praesentium est',15)
,(5,12,106,'Pizza',3,'eum dolores asperiores',false,'vel quisquam omnis',16)
,(1,17,106,'Sausages',5,'quo animi dolores',false,'porro earum et',17)
,(1,21,103,'Table',6,'laboriosam sint quos',false,'sit corrupti ut',18)
,(1,22,106,'Mouse',3,'ipsa eum perspiciatis',false,'totam praesentium voluptatum',19)
,(1,23,103,'Mouse',3,'saepe est dolore',false,'id aut facere',20)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,24,106,'Soap',4,'et perspiciatis ratione',false,'quia aut corrupti',21)
,(1,25,103,'Computer',5,'qui culpa dolorem',false,'necessitatibus veritatis corporis',22)
,(6,1,105,'Table',6,'consequatur laudantium est',false,'id rerum dolore',23)
,(3,2,107,'Bacon',5,'vitae quo ducimus',false,'quod voluptatem illum',24)
,(1,5,105,'Fish',5,'accusamus nisi tempora',false,'ipsum sequi cumque',25)
,(1,7,103,'Gloves',4,'enim sed sit',false,'maiores doloribus sequi',26)
,(1,8,104,'Ball',3,'ipsum natus tempora',false,'ut commodi autem',27)
,(2,8,104,'Car',6,'aliquid officiis eum',false,'corrupti illo quis',28)
,(2,11,105,'Chicken',6,'ea et dignissimos',false,'et fuga ad',29)
,(1,13,103,'Bike',6,'et necessitatibus repudiandae',false,'ratione et architecto',30)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,15,105,'Chips',3,'quia sit laborum',false,'tenetur fugiat quas',31)
,(2,17,106,'Table',3,'voluptate eos doloremque',false,'deserunt repellat totam',32)
,(2,21,103,'Chair',5,'quam dolorum optio',false,'voluptas accusamus dolor',33)
,(2,22,106,'Ball',6,'debitis fugit nesciunt',false,'fugiat necessitatibus a',34)
,(2,23,107,'Bike',3,'fugiat magni exercitationem',false,'perspiciatis excepturi animi',35)
,(2,24,103,'Mouse',5,'quia eum facilis',false,'ipsa ullam fugiat',36)
,(2,25,103,'Ball',4,'quidem nemo debitis',false,'eaque optio hic',37)
,(1,14,104,'Shoes',4,'nesciunt harum id',false,'velit officiis et',38)
,(2,15,104,'Keyboard',5,'atque aut enim',false,'rem eos repellendus',39)
,(3,17,105,'Keyboard',4,'quo totam est',false,'omnis eos et',40)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(3,21,107,'Pizza',4,'fugiat nisi reiciendis',false,'voluptas nisi voluptatem',41)
,(3,22,106,'Shirt',5,'reprehenderit ipsa sunt',false,'omnis sunt aut',42)
,(3,23,104,'Ball',5,'modi dolorem eos',false,'est vel id',43)
,(3,24,106,'Salad',5,'vel quidem repellat',false,'doloribus ex soluta',44)
,(3,25,107,'Ball',6,'at rem numquam',false,'modi debitis et',45)
,(7,1,105,'Keyboard',6,'eum sed ut',false,'eos non neque',46)
,(4,2,104,'Mouse',5,'quae et incidunt',false,'nesciunt quia repudiandae',47)
,(5,2,105,'Cheese',6,'sit nam deleniti',false,'neque sed earum',48)
,(2,5,105,'Cheese',5,'quam aut nisi',false,'autem explicabo a',49)
,(2,7,105,'Cheese',5,'qui ut dolore',false,'saepe pariatur sequi',50)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(3,8,105,'Chicken',3,'tenetur similique saepe',false,'maiores nostrum qui',51)
,(1,9,103,'Hat',5,'nobis sit maiores',false,'dicta quo earum',52)
,(4,10,103,'Chair',6,'numquam similique quibusdam',false,'quidem quam quia',53)
,(3,11,107,'Bacon',5,'distinctio sit omnis',false,'asperiores perferendis aut',54)
,(1,16,105,'Soap',3,'dignissimos quia sit',false,'minima tempore voluptas',55)
,(3,22,105,'Fish',4,'delectus nostrum explicabo',false,'et dolor amet',56)
,(4,23,104,'Pants',4,'eos dolorem ipsum',false,'et totam debitis',57)
,(4,25,107,'Cheese',6,'laboriosam fuga velit',false,'repellat rerum maxime',58)
,(2,14,103,'Sausages',6,'et repudiandae voluptatem',false,'cupiditate expedita ut',59)
,(4,17,103,'Bike',5,'consectetur necessitatibus voluptas',false,'ullam ut corporis',60)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,19,106,'Towels',4,'et esse eligendi',false,'in aut est',61)
,(4,21,107,'Car',6,'a molestias nulla',false,'praesentium reiciendis sed',62)
,(5,22,105,'Tuna',5,'error consequatur et',false,'ad sunt ea',63)
,(4,24,107,'Hat',4,'aspernatur dolor qui',false,'esse magni impedit',64)
,(5,25,107,'Keyboard',3,'nesciunt vel omnis',false,'voluptas consequatur harum',65)
,(1,3,106,'Tuna',6,'est officiis temporibus',false,'aut non fugiat',66)
,(1,4,104,'Sausages',6,'modi unde illo',false,'nemo eos mollitia',67)
,(3,7,105,'Mouse',4,'qui asperiores quidem',false,'enim dolor vel',68)
,(4,8,105,'Bacon',5,'mollitia odit nulla',false,'recusandae tempore dolorum',69)
,(2,9,103,'Tuna',4,'voluptate saepe explicabo',false,'fugit debitis facilis',70)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(5,10,105,'Salad',6,'ipsam velit cum',false,'inventore natus sit',71)
,(3,14,105,'Chicken',6,'consequatur ipsa consectetur',false,'consequatur magnam ut',72)
,(3,15,107,'Cheese',4,'corporis earum quos',false,'explicabo delectus sequi',73)
,(5,21,106,'Bike',3,'ipsum quaerat praesentium',false,'et quod et',74)
,(5,24,103,'Mouse',5,'modi voluptas amet',false,'doloremque dolorum id',75)
,(5,17,103,'Bike',6,'dolore asperiores omnis',false,'sunt assumenda eius',76)
,(6,21,103,'Hat',6,'atque architecto natus',false,'vel eius quis',77)
,(6,24,106,'Mouse',6,'illo dignissimos vero',false,'placeat ut architecto',78)
,(2,3,107,'Pants',4,'necessitatibus nemo qui',false,'nemo qui ea',79)
,(2,4,103,'Cheese',5,'debitis perspiciatis fugiat',false,'rerum porro expedita',80)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(3,5,104,'Shirt',6,'eligendi dolor rerum',false,'nostrum enim rerum',81)
,(1,6,107,'Computer',4,'quia exercitationem quae',false,'nam id sed',82)
,(4,7,105,'Salad',3,'impedit accusantium voluptas',false,'qui ut est',83)
,(5,8,107,'Towels',4,'expedita qui ab',false,'ut ex unde',84)
,(3,9,107,'Soap',5,'porro facere quia',false,'a eos qui',85)
,(6,10,107,'Salad',6,'et consectetur dolor',false,'voluptatibus hic eligendi',86)
,(2,13,105,'Towels',4,'fugiat quis minima',false,'est beatae est',87)
,(4,15,105,'Chair',3,'laborum et vel',false,'doloribus ipsam voluptates',88)
,(2,16,105,'Keyboard',4,'non est ipsam',false,'quisquam quia sequi',89)
,(1,18,105,'Computer',4,'optio ipsum amet',false,'voluptas saepe id',90)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(1,20,106,'Shirt',4,'et deserunt enim',false,'eligendi nisi non',91)
,(7,21,103,'Pants',4,'cumque laboriosam distinctio',false,'pariatur saepe dolores',92)
,(6,25,106,'Hat',6,'omnis et mollitia',false,'repudiandae commodi hic',93)
,(2,18,105,'Gloves',5,'sint et id',false,'quisquam alias quis',94)
,(2,19,105,'Computer',3,'id voluptatem molestiae',false,'omnis incidunt sint',95)
,(8,21,104,'Chair',4,'culpa aut quia',false,'eos optio inventore',96)
,(7,24,107,'Keyboard',6,'voluptatem rerum aperiam',false,'ut eos nihil',97)
,(6,2,105,'Chair',5,'consequuntur sed doloribus',false,'error nihil qui',98)
,(3,3,107,'Chips',4,'ratione ut a',false,'ut nobis accusamus',99)
,(3,4,105,'Cheese',4,'nam occaecati culpa',false,'autem rerum inventore',100)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(4,5,105,'Cheese',6,'ab qui vel',false,'vel quas vero',101)
,(2,6,105,'Hat',6,'consequatur aut qui',false,'et commodi beatae',102)
,(5,7,105,'Shirt',3,'minima adipisci recusandae',false,'dolores suscipit libero',103)
,(6,8,103,'Mouse',3,'similique omnis neque',false,'vel at qui',104)
,(4,11,104,'Bacon',4,'numquam praesentium rerum',false,'itaque aut hic',105)
,(3,13,105,'Bike',4,'rerum aspernatur nihil',false,'eum occaecati nihil',106)
,(4,14,104,'Bike',3,'qui distinctio qui',false,'sit sint magnam',107)
,(3,16,107,'Hat',4,'suscipit repellat eum',false,'quo quisquam sit',108)
,(3,18,103,'Sausages',6,'omnis provident alias',false,'ex ullam voluptatem',109)
,(3,19,103,'Pizza',3,'quod provident sunt',false,'laboriosam ut excepturi',110)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(2,20,107,'Computer',6,'quo ipsa expedita',false,'nesciunt molestiae et',111)
,(6,22,107,'Salad',3,'quis optio porro',false,'qui eos sint',112)
,(5,14,104,'Table',5,'rerum dolor sequi',false,'nisi nostrum facilis',113)
,(6,17,104,'Keyboard',3,'aliquid nulla dolores',false,'consectetur earum voluptatem',114)
,(4,19,104,'Ball',4,'quia est qui',false,'aperiam a qui',115)
,(4,3,107,'Chair',6,'voluptas eum sunt',false,'praesentium cumque et',116)
,(4,4,103,'Sausages',6,'perspiciatis earum veritatis',false,'eum aliquid quo',117)
,(5,5,104,'Towels',5,'voluptas molestiae quibusdam',false,'odio ut hic',118)
,(3,6,106,'Towels',4,'rerum repellendus voluptatem',false,'beatae omnis cumque',119)
,(6,7,107,'Keyboard',6,'dolores praesentium et',false,'alias voluptas quia',120)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(7,8,103,'Car',6,'doloremque consequatur rerum',false,'non delectus tempora',121)
,(4,9,106,'Table',6,'assumenda vel natus',false,'nemo sit magnam',122)
,(7,10,104,'Fish',5,'corrupti sint ut',false,'dolorum aliquid eveniet',123)
,(6,14,104,'Towels',5,'aliquam enim eligendi',false,'ipsum magni eaque',124)
,(4,16,105,'Pizza',3,'aliquam rerum voluptatem',false,'voluptatem dolore quis',125)
,(7,17,105,'Chips',3,'nihil molestiae temporibus',false,'dignissimos officiis omnis',126)
,(5,19,103,'Gloves',3,'vel ex id',false,'numquam possimus non',127)
,(7,14,105,'Fish',3,'libero blanditiis vero',false,'eveniet id dolore',128)
,(8,17,105,'Pants',3,'non pariatur consequatur',false,'asperiores qui consequatur',129)
,(4,18,104,'Salad',3,'earum quia tempore',false,'facilis est veritatis',130)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(6,19,107,'Sausages',4,'non omnis temporibus',false,'blanditiis iure quam',131)
,(3,20,106,'Computer',4,'odit autem et',false,'ipsam ut iusto',132)
,(9,21,104,'Shoes',6,'aliquam et voluptatem',false,'dolore nobis in',133)
,(7,22,105,'Tuna',3,'rerum expedita dolorum',false,'esse mollitia corrupti',134)
,(5,3,106,'Bike',5,'sit possimus magnam',false,'explicabo quae sequi',135)
,(5,4,104,'Towels',4,'qui est animi',false,'consequatur quo voluptatem',136)
,(6,5,106,'Tuna',6,'qui consequatur quae',false,'officiis est at',137)
,(4,6,106,'Bike',3,'unde sit laborum',false,'voluptas ut dolores',138)
,(7,7,107,'Pants',6,'ut et accusamus',false,'aut ut quia',139)
,(8,8,104,'Gloves',5,'atque deserunt dolores',false,'odio veniam et',140)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(5,9,106,'Gloves',5,'incidunt et autem',false,'qui mollitia velit',141)
,(5,11,106,'Computer',3,'sapiente qui assumenda',false,'mollitia officia ut',142)
,(4,13,105,'Chips',6,'ut sit necessitatibus',false,'ut qui libero',143)
,(5,15,104,'Car',4,'repellat ullam vero',false,'repudiandae cumque velit',144)
,(5,16,107,'Sausages',4,'perferendis et cumque',false,'est hic beatae',145)
,(7,19,107,'Chips',5,'numquam eligendi minima',false,'molestiae eum ipsam',146)
,(4,20,104,'Chair',4,'consectetur velit eos',false,'voluptates odit sit',147)
,(5,23,105,'Tuna',5,'reprehenderit illo molestias',false,'accusantium unde sed',148)
,(8,14,104,'Cheese',3,'ut et quod',false,'dolorem adipisci voluptatem',149)
,(6,15,107,'Pizza',5,'eos iste sapiente',false,'perspiciatis est cupiditate',150)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(6,16,103,'Towels',5,'quis iusto aut',false,'beatae quia error',151)
,(8,22,106,'Salad',3,'error totam velit',false,'autem at voluptatem',152)
,(6,23,106,'Pizza',4,'beatae molestiae praesentium',false,'doloribus aut quia',153)
,(8,2,104,'Soap',4,'sapiente quod est',false,'omnis possimus debitis',154)
,(6,3,106,'Computer',4,'vitae et aut',false,'debitis amet nostrum',155)
,(7,5,104,'Computer',5,'sit est voluptas',false,'ad molestiae eos',156)
,(5,6,103,'Table',3,'excepturi maxime quibusdam',false,'cum eos molestias',157)
,(9,8,106,'Shoes',6,'et nostrum molestiae',false,'sed aspernatur aliquid',158)
,(6,9,106,'Ball',3,'et facilis autem',false,'rerum et qui',159)
,(6,11,107,'Tuna',6,'nobis amet est',false,'voluptatibus nisi tempora',160)
;
INSERT INTO room (room_number,hotel_id,price,amenities,capacity,room_view,extendable,issues,room_id) VALUES 
(5,13,103,'Pants',6,'error nihil quam',false,'omnis laboriosam amet',161)
,(9,14,107,'Pizza',3,'alias molestiae incidunt',false,'ut est eveniet',162)
,(7,15,107,'Sausages',5,'et esse et',false,'at animi sunt',163)
,(5,18,104,'Soap',4,'eaque similique sed',false,'ut accusantium quo',164)
,(8,19,106,'Soap',4,'aut voluptas sequi',false,'maxime ex qui',165)
,(5,20,106,'Pizza',5,'animi officiis qui',false,'asperiores placeat sint',166)
,(7,23,105,'Chair',4,'modi quae ipsum',false,'dolore cum veniam',167)
,(7,3,103,'Pants',5,'praesentium vero voluptates',false,'voluptatem qui non',168)
,(8,5,103,'Fish',4,'et ut explicabo',false,'ut eum dolorem',169)
;