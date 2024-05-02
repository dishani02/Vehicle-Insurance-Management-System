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
);*/

/* coverage Table */
CREATE TABLE Coverage(
    coverage_type CHAR(5) NOT NULL,
    description VARCHAR(200),
    PRIMARY KEY(coverage_type)
);
/* Policy Table */
CREATE TABLE Policy(
    company_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    start_date VARCHAR(10),
    end_date VARCHAR(25),
    coverage VARCHAR(25),
    PRIMARY KEY(policy_id),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id)
);
/* policy_covarge Table */
CREATE TABLE Policy_Covarge(
    policy_id CHAR(5) NOT NULL,
    coverage_type CHAR(5) NOT NULL,
    PRIMARY KEY(policy_id, coverage_type),
    FOREIGN KEY(policy_id) REFERENCES Policy(policy_id),
    FOREIGN KEY(coverage_type) REFERENCES Coverage(coverage_type)
);
/* Vehicle Table */
CREATE TABLE Vehicle(
    customer_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    coverage_type VARCHAR(25) NOT NULL,
    model VARCHAR(25),
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




/* Report Table */
CREATE TABLE Report(
    admin_id CHAR(5) NOT NULL,
    report_id CHAR(5) NOT NULL,
    report_date VARCHAR(10),
    report_type VARCHAR(25),
    PRIMARY KEY(report_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);

-- insert data

INSERT INTO Insurance_company VALUES ( 123,"Drive Peak", "Vehicle Insurance", "dishani@gmail.com", "123/4,colombo");



INSERT  INTO Admin VALUES(1,123, "shamal","20093278949","shamal@gmail.com","40bd001563085fc35165329ea1ff5c5ecbdbbeef");

INSERT INTO Agent VALUES ( 123,1, 1,"Dishani", "200274903349", "dishani@gmail.com", "40bd001563085fc35165329ea1ff5c5ecbdbbeef");



INSERT INTO Customer VALUES ( 1,"kamal", "perera", 1,1, "200274903349 ", "dishani@gmail.com", "40bd001563085fc35165329ea1ff5c5ecbdbbeef","437/12","kottawa","pannipitiya");

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