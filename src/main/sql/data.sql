    DROP TABLE IF EXISTS CheckOut;
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
    	grade VARCHAR(20) NOT NULL,
        school VARCHAR(50) NOT NULL,
        level VARCHAR(50) NOT NULL,
        custodyIssueDescription VARCHAR(100),
        custodyIssue INT(2),
        needCurrentApplication INT(2), 
        PRIMARY KEY (ID)
    )ENGINE=InnoDB;
    
    
    CREATE TABLE CheckIn(
        ID INT(6),		
        name VARCHAR(30),
        lastName VARCHAR(50),
    	time DATETIME DEFAULT '00:00:00',
    	date datetime DEFAULT '0000-00-00',
    	activity1 VARCHAR(50),
    	activity2 VARCHAR(50), 
    	
    FOREIGN KEY (ID) REFERENCES StudentInfo(ID) ON DELETE CASCADE
    )ENGINE=InnoDB;
    
    
    CREATE TABLE CheckOut(
    	ID INT(6),
        name VARCHAR(30),
        nastName VARCHAR(50),
    	pickedUpBy VARCHAR(50) NOT NULL,
    	time DATETIME DEFAULT '00:00:00',
    	date datetime DEFAULT '0000-00-00',
    	totalHours DOUBLE(10,2),
        FOREIGN KEY (ID) REFERENCES StudentInfo(ID) ON DELETE CASCADE
    )ENGINE=InnoDB;
    
    
