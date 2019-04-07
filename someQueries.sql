
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

CREATE VIEW view1 AS (
	(SELECT * FROM room NATURAL JOIN hotel 
	 WHERE NOT EXISTS
	(SELECT room_id FROM booking WHERE
	(room.room_id = $room_id) AND ($startDate BETWEEN $startDate AND $endDate) AND ($endDate BETWEEN $startDate AND $endDate))
	AND 
	(SELECT room_id FROM rental WHERE
	(room.room_id = $room_id) AND ($startDate BETWEEN $startDate AND $endDate) AND ($endDate BETWEEN $startDate AND $endDate))
	))	

CREATE OR REPLACE VIEW view2 AS 
	SELECT DISTINCT * FROM room NATURAL JOIN hotel WHERE
	city = $city;

	

	