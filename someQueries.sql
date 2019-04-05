
SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE 
	city = @city AND 
	stars >= @stars AND
	capacity <= @capacity AND
	price <= @price AND
	number_of_rooms <= @number_of_rooms;

    	
SELECT DISTINCT * FROM room NATURAL JOIN hotel, hotel_chain WHERE 
	city = 'Russelmouth' AND 
	stars >= @stars AND
	capacity <= @capacity AND
	price <= @price AND
	number_of_rooms <= @num AND
	hotel_chain.address = @address;


	

	