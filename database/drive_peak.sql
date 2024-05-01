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
/* CRS  Countacr us Table */
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
/* inquiary Table TODO: need to create csr table */

/*CREATE TABLE Inquiry(
    customer_id CHAR(5) NOT NULL,
    csr_id CHAR(5) NOT NULL,
    inquiry_id CHAR(5) NOT NULL,
    inquiry VARCHAR(200),
    date DATE,
    PRIMARY KEY(inquiry_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY(csr_id) REFERENCES Csr(csr_id)
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
git pull 


-- insert data

INSERT INTO Insurance_company VALUES ( 123,"Drive Peak", "Vehicle Insurance", "dishani@gmail.com", "123/4,colombo");

INSERT  INTO Admin VALUES(1,123, "shamal","20093278949","shamal@gmail.com","40bd001563085fc35165329ea1ff5c5ecbdbbeef");

INSERT INTO Agent VALUES ( 123,1, 1,"Dishani", "200274903349", "dishani@gmail.com", "40bd001563085fc35165329ea1ff5c5ecbdbbeef");

INSERT INTO Customer VALUES ( 1,"kamal", "perera", 1,1, "200274903349 ", "dishani@gmail.com", "40bd001563085fc35165329ea1ff5c5ecbdbbeef","437/12","kottawa","pannipitiya");