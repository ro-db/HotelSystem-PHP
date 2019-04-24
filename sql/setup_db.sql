CREATE SCHEMA IF NOT EXISTS HotelSystem;

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

-- Booking and Rental assume that customer will also be archived and never deleted.
CREATE TABLE booking (booking_id SERIAL PRIMARY KEY, 
					  SIN_NUMBER INT, 
					  room_id INT,
					  start_date  DATE,
                      end_date DATE,
					  FOREIGN KEY (SIN_NUMBER) REFERENCES customer (SIN_NUMBER),
					  checked_in BOOLEAN DEFAULT TRUE
					 );

CREATE TABLE rental (rental_id SERIAL PRIMARY KEY,
					 SIN_NUMBER INT,
					 room_id INT,
					 start_date DATE,
					 end_date DATE,
					 price INT,
					 FOREIGN KEY (SIN_NUMBER) REFERENCES customer (SIN_NUMBER)
					);

CREATE FUNCTION destroy_rooms_func() RETURNS trigger AS $destroy_rooms$
	BEGIN
		DELETE FROM room WHERE OLD.hotel_id = room.hotel_id;
		RETURN NULL;
	END;

$destroy_rooms$ LANGUAGE plpgsql;

CREATE TRIGGER destroy_rooms BEFORE DELETE ON hotel FOR EACH ROW EXECUTE PROCEDURE destroy_rooms_func();

CREATE FUNCTION destroy_hotels_func() RETURNS trigger AS $destroy_hotels$
	BEGIN
		DELETE FROM hotel WHERE OLD.hotel_chain_id = hotel.hotel_chain_id;
		RETURN NULL;
	END;

$destroy_hotels$ LANGUAGE plpgsql;

CREATE TRIGGER destroy_hotels BEFORE DELETE ON hotel_chain FOR EACH ROW EXECUTE PROCEDURE destroy_hotels_func();
