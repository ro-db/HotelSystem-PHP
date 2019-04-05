
SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE 
                city = @city AND 
                stars >= @minimumStars AND
                capacity <= @minimumCapacity AND
                price <= @maximumPrice AND
                number_of_rooms <= @minimumRooms;

    	
SELECT DISTINCT * FROM room NATURAL JOIN hotel, hotel_chain WHERE 
	city = @city AND 
    stars >= @minimumStars AND
    capacity <= @minimumCapacity AND
    price <= @maximumPrice AND
    number_of_rooms <= @minimumRooms;
	hotel_chain.address = @hotelChain;


	

	