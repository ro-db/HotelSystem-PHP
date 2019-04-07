
SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE TRUE
                AND city = $city
                AND stars >= $minimumStars
                AND capacity <= $minimumCapacity
                AND price <= $maximumPrice
                AND number_of_rooms <= $minimumRooms;

    	
SELECT DISTINCT * FROM room NATURAL JOIN hotel, hotel_chain WHERE TRUE
	AND hotel_chain.address = $hotelChain
	AND city = $city
    AND stars >= $minimumStars
    AND capacity <= $minimumCapacity
    AND price <= $maximumPrice
    AND number_of_rooms <= $minimumRooms;


// Views

CREATE OR REPLACE VIEW view2 AS 
	SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE
	city = $city AND
	capacity <= $minimumCapacity;

	

	