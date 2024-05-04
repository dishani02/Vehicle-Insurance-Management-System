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
    first_name VARCHAR(25),
    last_name VARCHAR(25),
    nic VARCHAR(25),
    email VARCHAR(25),
    home_no VARCHAR(10) NOT NULL,
    street VARCHAR(20) NOT NULL,
    city VARCHAR(10) NOT NULL,
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
    customer_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR( 10) NOT NULL,
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
    customer_id INT NOT NULL,
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

/* coverage Table changed */
CREATE TABLE Coverage_type(
    company_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    coverage_type CHAR(5) NOT NULL,
    description VARCHAR(200),
    PRIMARY KEY(coverage_type)
);
/* Policy Table changed  */
CREATE TABLE Policy(
    company_id CHAR(5) NOT NULL,
    policy_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    coverage_type VARCHAR(25) NOT NULL,
    start_date VARCHAR(10),
    end_date VARCHAR(25),  
    PRIMARY KEY(policy_id),
    FOREIGN KEY(company_id) REFERENCES Insurance_company(company_id),
    FOREIGN KEY(vehicle_id) REFERENCES Vehicle(vehicle_id)
);


/* Vehicle Table */

CREATE TABLE Vehicle(
    customer_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    model VARCHAR(25),
    chassis_no VARCHAR(190),
    year DATE,
    -- insured_category  VARCHAR(50) NOT NULL,
    PRIMARY KEY(vehicle_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
 
);
/* Payment Table add vehicle id and status  */
CREATE TABLE Payment(
    payment_id CHAR(5) NOT NULL,
    admin_id CHAR(5) NOT NULL,
    customer_id CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    amount INT(10),
    payment_date DATE,
    method VARCHAR(7),
    status VARCHAR(10),
    PRIMARY KEY(payment_id),
    FOREIGN KEY(customer_id) REFERENCES Customer(customer_id),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id),
    FOREIGN KEY(vehicle_id) REFERENCES Vehicle(vehicle_id)
);


-- INSERT INTO Payment VALUES (001,1,1,1GTF2,'25000',2020-09-45,'online',"successful");
-- INSERT INTO Payment VALUES (002,1,3,1111,'40000',2020-03-45,'online',"successful");
-- INSERT INTO Payment VALUES (003,1,1,342,'25000',2021-08-45,'online',"successful");
-- INSERT INTO Payment VALUES (004,1,2,9999,'40000',2023-03-45,'online',"successful");
-- INSERT INTO Payment VALUES (005,1,1,447,'25000',2025-05-45,'online',"successful");
-- INSERT INTO Payment VALUES (006,1,1,ABD23'40000',2023-03-45,'online',"successful");



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
    amount FLOAT(),
    issued_date DATE ,
    status VARCHAR(25),
    PRIMARY KEY(claim_id),
    FOREIGN KEY(manager_id) REFERENCES Admin(manager_id),
    FOREIGN KEY(vehicle_id) REFERENCES Admin(vehicle_id),
    FOREIGN KEY(customer_id) REFERENCES Admin(customer_id)
);


INSERT INTO Claim VALUES (1,"1GTF2",1,1021,67000,"2023-09-09","Approved");
INSERT INTO Claim VALUES (1, "342",1,1031, 15000,"2023-09-09","Approved");
INSERT INTO Claim VALUES (1,"447",1,1041,12000,"2023-09-09","Rejected");





















-- new tables




/* Claim Table */
CREATE TABLE Claim(
    manager_id  CHAR(5) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    customer_id CHAR(5) NOT NULL,
    claim_id CHAR(5) NOT NULL,
    status VARCHAR(25),
    amount INT(10),
    PRIMARY KEY(),
    FOREIGN KEY(admin_id) REFERENCES Admin(admin_id)
);

CREATE TABLE Accident(
    accident_id INT NOT NULL AUTO_INCREMENT,
    agent_id CHAR(5) NOT NULL,
    informant_name  VARCHAR(20) NOT NULL,
    vehicle_id CHAR(5) NOT NULL,
    date DATE,
    place  VARCHAR(20) NOT NULL,
    description VARCHAR(50) NOT NULL,
    PRIMARY KEY(accident_id),
    FOREIGN KEY(agent_id ) REFERENCES Agent(agent_id)
)


CREATE TABLE Accident_image(
    id INT NOT NULL AUTO_INCREMENT,
    accident_id INT NOT NULL,
    image VARCHAR(190),
    PRIMARY KEY(id),
    FOREIGN KEY(accident_id) REFERENCES Accident(accident_id)
)


-- CREATE TABLE Renew_policy(
--      renew_id INT NOT NULL AUTO_INCREMENT ,
--      vehicle_id CHAR(5) NOT NULL,
--      contact_no VARCHAR(25) NOT NULL,
--      duration  VARCHAR(25) NOT NULL,
--      insurance_category  VARCHAR(50) NOT NULL,
--      coverage_type VARCHAR(25) NOT NULL,
--      installment_type VARCHAR(25) NOT NULL,
--      PRIMARY KEY(accident_id),
--      FOREIGN KEY(vehicle_id) REFERENCES Vehicle(vehicle_id)

-- )