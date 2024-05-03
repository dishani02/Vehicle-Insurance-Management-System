CREATE DATABASE Drive_peak_web;

/*  Insurance comapanay Table */
CREATE TABLE Insurance_company(
    company_id CHAR(5) NOT NULL,
    name VARCHAR(25),
    type VARCHAR(50),
    email VARCHAR(25),
    address VARCHAR(50),
    PRIMARY KEY(company_id)
);
/*  Insurance comapanay Contact Number Table*/
CREATE TABLE Insurance_comapanay_contact_no(
    company_id CHAR(5) NOT NULL,
    contact_no VARCHAR(25) NOT NULL,
    PRIMARY KEY(company_id, contact_no),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id)
);
/* System administrator Table */
CREATE TABLE Admin(
    admin_id CHAR(5) NOT NULL,
    company_id CHAR(5) NOT NULL,
    name VARCHAR(25),
    nic VARCHAR(25),
    email VARCHAR(25),
    password VARCHAR(190),
    PRIMARY KEY(admin_id),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id)
);
/*  System administrator Contact Number Table*/
CREATE TABLE Admin_contact_no(
    admin_id CHAR(5) NOT NULL,
    contact_no VARCHAR(25) NOT NULL,
    PRIMARY KEY(admin_id, contact_no),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);
/* Insurance company agent Table */
CREATE TABLE Agent(
    company_id CHAR(5) NOT NULL,
    admin_id CHAR(5) NOT NULL,
    agent_id CHAR(5) NOT NULL,
    name VARCHAR(25),
    nic VARCHAR(25),
    email VARCHAR(25),
    password VARCHAR(190),
    PRIMARY KEY(agent_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id)
);
/* Table Insurance company agent Contact Number */
CREATE TABLE Agent_contact_no(
    agent_id CHAR(5) NOT NULL,
    contact_no VARCHAR(25) NOT NULL,
    PRIMARY KEY(agent_id, contact_no),
    FOREIGN KEY(agent_id) REFERENCES Agent(agent_id)
);
/*TODO:*/

/* Claim manager Table */
/* Claim manager Countacr us Table */
/* Cheef engineer Table */
/* Cheef engineer  Countacr us Table */
/* Manager_Cheef engineer Table */

/* CRS Table */
CREATE TABLE Csr(
    admin_id CHAR(5) NOT NULL,
    csr_id CHAR(5) NOT NULL,
    name VARCHAR (25),
    nic VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    password VARCHAR(20),
    PRIMARY KEY (csr_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);
/* CRS  Countact us Table */
CREATE TABLE Csr_contact_no(
    csr_id CHAR(5) NOT NULL,
    contact_no VARCHAR(25) NOT NULL,
    PRIMARY KEY(csr_id,contact_no),
    FOREIGN KEY(csr_id) REFERENCES csr(csr_id)
);
/* Customer Table */
CREATE TABLE Customer(
    customer_id CHAR(5) NOT NULL,
    first_name VARCHAR(10) NOT NULL,
    last_name VARCHAR(10) NOT NULL,
    admin_id CHAR(5) NOT NULL,
    agent_id CHAR(5) NOT NULL,
    nic VARCHAR(25),
    email VARCHAR(25),
    password VARCHAR(190),
    home_no VARCHAR(10) NOT NULL,
    street VARCHAR(20) NOT NULL,
    city VARCHAR(10) NOT NULL,
    PRIMARY KEY(customer_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id),
    FOREIGN KEY(agent_id) REFERENCES Agent(agent_id)
);
/* Customer Countacr us Table */
CREATE TABLE Customer_Contact_no(
    contact_no VARCHAR(15) NOT NULL,
    customer_id CHAR(5) NOT NULL,
    PRIMARY KEY(contact_no, customer_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id)
);
/* inquiry Table */

/*CREATE TABLE Inquiry(
    customer_id CHAR(5) NOT NULL,
    csr_id CHAR(5) NOT NULL,
    inquiry_id CHAR(5) NOT NULL,
    inquiry VARCHAR(200),
    date DATE NOT NULL,
    PRIMARY KEY(inquiry_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY(Csr_id) REFERENCES Csr(Csr_id_id)
);
*/

/* coverage Table */
CREATE TABLE Coverage_type(
    company_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    coverage_type CHAR(5) NOT NULL,
    description VARCHAR(200),
    PRIMARY KEY(coverage_type)
);
/* Policy Table changed */
CREATE TABLE Policy(
    company_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    start_date VARCHAR(10),
    end_date VARCHAR(25),
    PRIMARY KEY(policy_id),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id)
);

/* Vehicle Table */
CREATE TABLE Vehicle(
    customer_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    coverage_type VARCHAR(25) NOT NULL,
    model VARCHAR(25),
    chassis_no VARCHAR(190),
    year DATE,
    PRIMARY KEY(vehicle_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY(policy_id) REFERENCES Policy(policy_id),
    FOREIGN KEY(coverage_type) REFERENCES Coverage(coverage_type)
);
/* Payment Table */
CREATE TABLE Payment(
    payment_id CHAR(5) NOT NULL,
    customer_id CHAR(5) NOT NULL,
    admin_id CHAR(5) NOT NULL,
    amount INT(10),
    payment_date VARCHAR(10),
    method VARCHAR(7),
    PRIMARY KEY(payment_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);

/*Claim Table need to create csr table*/
CREATE TABLE Report(
    admin_id CHAR(5) NOT NULL,
    report_id CHAR(5) NOT NULL,
    report_date VARCHAR(10),
    report_type VARCHAR(25),
    PRIMARY KEY(report_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);





/* Claim Table */
CREATE TABLE Claim(
    manager_id  CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    customer_id CHAR(5) NOT NULL,
    claim_id CHAR(5) NOT NULL,
    status VARCHAR(25),
    amount (),
    PRIMARY KEY(report_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);

-- insert data

INSERT INTO Insurance_company VALUES ( 123,"Drive Peak", "Vehicle Insurance", "dishani@gmail.com", "123/4,colombo");


/*Admin Details*/

INSERT  INTO Admin VALUES(1,123, "shamal","20093278949","shamal@gmail.com","40bd001563085fc35165329ea1ff5c5ecbdbbeef");

/*Admin contact details*/
INSERT INTO Admin_contact_no VALUES (1,0775956803);


/*Agent Details*/
INSERT INTO Agent VALUES ( 123,1, 1,"pavan","200497783267", "pavan@gmail.com", "6820b09045d624d5b91ea975e13d347a7fc79ac0");
INSERT INTO Agent VALUES ( 123,1, 2,"Saman","200045893267", "saman@gmail.com", "6820b09045d624d5b91ea975e13d347a7fc79ac0");
INSERT INTO Agent VALUES ( 123,1, 3,"Vihan","200132125680", "vihan@gmail.com", "74b6fbfb697d59b0c52277645ce8044be9181780");
INSERT INTO Agent VALUES ( 123,1, 4,"Amal","200245789356", "amal@gmail.com", " c9f4ae94e840e771aafe38c47f09f24d577b5943");
INSERT INTO Agent VALUES ( 123,1, 5,"Praveen", "200066896732", "praveen@gmail.com", "c5c62e82f4f0c6fbcbb0542fd26d05084c6f8fa9");
INSERT INTO Agent VALUES ( 123,1, 6,"Dinesh", "200156789043", "dinesh@gmail.com", "303b469f296cffecea6cddbcd5ee5b86dbb5ce1e");

/*Agent contact details*/

INSERT INTO Agent_contact_no VALUES (1,0705678902);
INSERT INTO Agent_contact_no VALUES (2,0769008765);
INSERT INTO Agent_contact_no VALUES (3,0773426755);
INSERT INTO Agent_contact_no VALUES (4,0706763080);
INSERT INTO Agent_contact_no VALUES (5,0752215577);
INSERT INTO Agent_contact_no VALUES (6,0779044321);

/*Customer Details*/
INSERT INTO Customer VALUES ( 1,"kamal", "perera", 1,1, "200274903349 ", "dishani@gmail.com", "40bd001563085fc35165329ea1ff5c5ecbdbbeef","437/12","kottawa","pannipitiya");
INSERT INTO Customer VALUES ( 2,"Rusith", "Jayakody", 1,2, "200100895621 ", "rusith@gmail.com", "924e9d8da551f4e24d4a9eb98821f3200fae5956","502/B","Kottawa","Pannipitiya");
INSERT INTO Customer VALUES ( 3,"Dinuka", "Perera", 1,1, "200290102030", "dinuka@gmail.com", "845d4ca9f8ae8344e6e22b32dcc36f96eeec4448","31/A","Malabe","Athurugiriya");
INSERT INTO Customer VALUES ( 4,"Asanda", "Guruge", 1,3, "200080542190", "asanda@gmail.com", "9cc5192c1c8a87ad915487d362243692c716f5c2","45/2","Kirulapone","Colombo");
INSERT INTO Customer VALUES ( 5,"Wasantha", "Wijesundara", 1,4, "200264993044 ", "wasantha@gmail.com", "f7454c5d62dedd50de81d9db940a5de4b06d7ee2","89/2","Wijerama","Gangodawila");
INSERT INTO Customer VALUES ( 6,"Awishka", "Karunarathne", 1,6, "200100609987 ", "awishka@gmail.com", "4ee34811b45735ef78730f509c65e8882ab88899","12/A","Rajagiriya","Colombo");

/*Customer contact details*/

INSERT INTO Customer_Contact_no VALUES (1,0776678844);
INSERT INTO Customer_Contact_no VALUES (2,0761112345);
INSERT INTO Customer_Contact_no VALUES (3,0770905477);
INSERT INTO Customer_Contact_no VALUES (4,0708904465);
INSERT INTO Customer_Contact_no VALUES (5,0759097734);
INSERT INTO Customer_Contact_no VALUES (6,0765577884);

/*Csr details */

INSERT INTO Csr VALUES (1,01,"Olivia","200351128106","hafsarifai01@gmail.com","ot7");
INSERT INTO Csr VALUES (1,02,"Priya","258745123678","priya@gmail.com","abcd");
INSERT INTO Csr VALUES (1,03,"Rohan","203648751295","rohan@gmail.com","lmao");
INSERT INTO Csr VALUES (1,04,"Varun","200078962513","varun@gmail.com","rofl");
INSERT INTO Csr VALUES (1,05,"Akash","199978256341","akash@gmail.com","idk");

/*csr contact details*/

INSERT INTO Csr_contact_no VALUES (01,0754689510);
INSERT INTO Csr_contact_no VALUES (02,0777804621);
INSERT INTO Csr_contact_no VALUES (03,0777412368);
INSERT INTO Csr_contact_no VALUES (04,0777871230);
INSERT INTO Csr_contact_no VALUES (05,0757862543);

/*inquiry 

INSERT INTO Inquiry VALUES (customer_id,01,0001,"When is my insurance policy up for renewal ,will there be any changes ?","2018.04.25");
INSERT INTO Inquiry VALUES (customer_id,02,0002,"How do i file a claim for an accident to my vehicle? and what documents do i need to provide when filing? ","2018.08.02");
INSERT INTO Inquiry VALUES (customer_id,03,0003,"How much will my insurance premium be? Are there any discounts available for my vehicle insurance?","2019.09.18");
INSERT INTO Inquiry VALUES (customer_id,04,0004,"Can i access my insurance policy documents online and how can i request copies if needed?","2019.12.23");
INSERT INTO Inquiry VALUES (customer_id,05,0005,"what are the specific types of damages or incidents are covered by my policy?","2020.02.05");
 got to insert the customer id 
 */

/*Policy details*/

INSERT INTO Policy VALUES (123,1,'2008-11-11','2009-11-11');
INSERT INTO Policy VALUES (123,2,'2009-11-11','20010-11-11');
INSERT INTO Policy VALUES (123,3,'2008-11-11','2009-11-11');
INSERT INTO Policy VALUES (123,4,'2008-11-11','2009-11-11');
INSERT INTO Policy VALUES (123,5,'2008-11-11','2009-11-11');
INSERT INTO Policy VALUES (123,6,'2008-11-11','2009-11-11');


/* coverage Table */

INSERT INTO Coverage VALUES (1,"Comprehensive");
INSERT INTO Coverage VALUES (2,"Third Party");



/* policy_covarge Table */

INSERT INTO Policy_Covarge VALUES (1,1);
INSERT INTO Policy_Covarge VALUES (2,2);




/* Vehicle Table */

INSERT INTO Vehicle VALUES (1, 'GTF2435', 1, 1, 'Toyota Camry',"1HGCM82633A123456", '2020-01-01');
INSERT INTO Vehicle VALUES (1, "ABD2345", 1, 2, 'Honda Civic',"1HGCM82633A1278463", '2018-05-01');
INSERT INTO Vehicle VALUES (1, "ABD2345", 1, 2, 'Honda Civic',"1HGCM82633A1278463", '2018-05-01');
INSERT INTO Vehicle VALUES (1, "ABD2345", 1, 2, 'Honda Civic',"1HGCM82633A1278463", '2018-05-01');
INSERT INTO Vehicle VALUES (1, "ABD2345", 1, 2, 'Honda Civic',"1HGCM82633A1278463", '2018-05-01');
INSERT INTO Vehicle VALUES (1, "ABD2345", 1, 2, 'Honda Civic',"1HGCM82633A1278463", '2018-05-01');





