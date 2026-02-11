CREATE TABLE Product (
    prodId INT AUTO_INCREMENT PRIMARY KEY,
    prodName VARCHAR(200) NOT NULL, 
    prodPicNameSmall VARCHAR(200) NOT NULL,
    prodPicNameLarge VARCHAR(200) NOT NULL,
    prodDescripShort VARCHAR(1000),
    prodDescripLong VARCHAR(3000),
    prodPrice DECIMAL(8,2) NOT NULL,
    prodQuantity INT NOT NULL
);

INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Amazon Echo Show 8, Smart Display with Alexa', 'amazonEchoSmall.jpg', 'amazonEchoLarge.jpg', 'Enjoy music, TV and video calls with room-filling spatial audio that makes everything feel a little more alive.', 'Amazons Echo Show 8 has had a glow-up. With a thinner display and faster processing, it is smart, sharp and ready to help. Enjoy music, TV and video calls with room-filling spatial audio that makes everything feel a little more alive. Whether it is your favourite playlist or a midweek catch-up, it sounds spot on. Need dinner ideas? Want to check your calendar? Echo Show puts recipes, reminders and shopping lists right where you can see them. No more scribbled notes on the fridge. Video calls feel natural with auto-framing, zoom and noise reduction. And when you are away, use live view to check in on pets or people.', 179.00, 220);

INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Amazon Echo Dot Max, Smart Speaker with Alexa', 'echoDotMaxSmall.jpg', 'echoDotMaxLarge.jpg', 'Crank it up with the Amazon Echo Dot Max. It fills your room with rich, adaptive audio that knows exactly how to behave in your space.', 'Crank it up with the Amazon Echo Dot Max. It fills your room with rich, adaptive audio that knows exactly how to behave in your space. Whether you are belting out tunes or binging podcasts, it fine-tunes playback for maximum impact. You can stream your favourites from Amazon Music, Apple Music, Spotify and more. With the AZ3 chip under the hood, everything runs fast and smooth. And thanks to built-in Omnisense tech, it can trigger routines based on temperature or presence. Cosy lights when you walk in? Sorted.', 99.00, 420);

INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Amazon Echo Spot Smart Alarm Clock with Alexa', 'smartAlarmClockSmall.jpg', 'smartAlarmClockLarge.jpg', 'The Amazon Echo Spot is so much more than just a clock. It lets you check the time, weather and song titles all in one handy little hub.', 'The Amazon Echo Spot is so much more than just a clock. It lets you check the time, weather and song titles all in one handy little hub. If you are a slow riser in the morning, Alexa Routines will help ease you into your day. You can set them to gently wake you up with gradual light and soothing music. And speaking of music, it has a big, rich sound with a punchy bass so your tunes will sound great. Just ask Alexa to play songs, playlists or audiobooks from Amazon Music, Apple Music, Spotify and more.', 79.99, 670);

INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Amazon Echo Dot Kids, Smart Speaker with Alexa', 'kidsEchoDotSmall.jpg', 'kidsEchoDotLarge.jpg', 'Learning just got a whole lot more fun. Made with little ones in mind, the Amazon Echo Dot Kids has a funky design, kid-friendly content, and most importantly – parental controls', 'This 5th gen speaker is the same dinky size as the 4th gen, but Amazon have packed in a larger driver, so it sounds louder than ever. Perfect for streaming music, listening to a bedtime story, or playing interactive games. They can take charge of their routines as they grow more independent too. Alexa can help them set their own alarms, switch off smart lights, and call (parent-approved) friends and family.', 64.99, 1475);
