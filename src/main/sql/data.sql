    DROP TABLE IF EXISTS CheckInOut;
    DROP Table IF EXISTS CheckIn;
    DROP Table IF EXISTS Login;
    DROP TABLE IF EXISTS StudentInfo;
    
    CREATE TABLE Login(
    	Username VARCHAR(50)PRIMARY KEY NOT NULL,
    	Name VARCHAR(30) NOT NULL,
        LastName VARCHAR(50) NOT NULL,
        Password VARCHAR(20)NOT NULL
    )ENGINE=InnoDB;
    
    
    CREATE TABLE StudentInfo(
        ID INT(6) NOT NULL AUTO_INCREMENT,
    	name VARCHAR(30) NOT NULL,
        lastName VARCHAR(50) NOT NULL,
    	gender VARCHAR(10) NOT NULL,
    	phone VARCHAR(20) NOT NULL, 
    	grade VARCHAR(20) NOT NULL,
        school VARCHAR(50) NOT NULL,
        level VARCHAR(50) NOT NULL,
        PRIMARY KEY (ID)
    )ENGINE=InnoDB;
    
    
    CREATE TABLE CheckInOut(
        ID INT(6) NOT NULL,
        lastName VARCHAR(30),		
    	date DATE DEFAULT '00-00-0000',
    	checkInTime TIME DEFAULT '00:00:00',
    	activity1 VARCHAR(50),
    	activity2 VARCHAR(50),
    	pickedUpBy VARCHAR(50),
    	checkOutTime TIME DEFAULT '00:00:00',
    	totalHours DOUBLE(10,2),
    FOREIGN KEY (ID) REFERENCES StudentInfo(ID) ON DELETE CASCADE
    )ENGINE=InnoDB;
    
   
    
    
