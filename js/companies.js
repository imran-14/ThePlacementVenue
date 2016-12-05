function more_info(x) {
	var moreDiv = document.getElementById("more");
	moreDiv.innerHTML="";
	var moreInfo = document.createElement("p");
	var moreLink = document.createElement("a");
	moreLink.id="link";
	moreLink.innerHTML="Visit Company's Website";
	var logo = document.createElement("img");
	logo.id="moreLogo";
	
	
	if(x=="microsoft") {
		logo.src="images/company/microsoft.png";
		moreInfo.innerHTML = "Microsoft is always known to recruit smartest of the smart people. Microsoft India is small in size with around 5000 employees. The company does not conduct massive recruitment drives like others. Instead they choose a very limited number of top ranked and quality colleges across India and conduct on campus recruitments. In addition to on campus, Microsoft also conducts off campus placements quite frequently to fill in the vacancies for specific job profiles ranging from software design engineer to project manager.";
		moreLink.href="http://microsoft.com";
	}
	if(x=="google") {
		logo.src="images/company/google.png";
		moreInfo.innerHTML = "Google has opening but only for serious candidates. Interview criteria and Placement criteria of google is one of the most stringent activity which students face , if they ever try to work with google. Working with google has always been alluring but to crack google interview is not easy , if you take burden. What google looks for is simply your creativity , nothing else. Eligibility criteria for Google jobs are being discussed in detail";
		moreLink.href="http://google.com";
	}
	if(x=="facebook") {
		logo.src="images/company/facebook.png";
		moreInfo.innerHTML = "It's clear that Facebook looks for candidates who will fit well into its corporate culture regardless of what country they come from. Facebook hires heavily from places outside the U.S., including Russia, India, and Eastern Europe. For candidates with less-than-stellar grades, Facebook's solution is actually pretty straightforward: Have some good side projects.";
		moreLink.href="http://facebook.com";
	}
	if(x=="oracle") {
		logo.src="images/company/oracle.jpg";
		moreInfo.innerHTML = "An Oracle developer may be asked to perform any of a number of tasks, from developing andd launching a database system to maintaining and upgrading a company's storage capacity. The range of duties depends entirely on the type of developer. Generally, developers have knowledge of the components of personal computers, networks, programming languages, database systems, and the internet, along with their interaction with one another.";
		moreLink.href="http://oracle.com";
	}
	if(x=="twitter") {
		logo.src="images/company/twitter.png";
		moreInfo.innerHTML = "As a global real-time service, the Twitter platform requires a broad range of technical skills, from mobile and infrastructure to analytics and machine learning. Engineering here is challenging and fast paced. People who work at Twitter say the biggest draw is their colleagues. You’ll find a generous, friendly team that is passionate about Twitter and the world at large. ";
		moreLink.href="http://twitter.com";
	}
	if(x=="accenture") {
		logo.src="images/company/accenture.png";
		moreInfo.innerHTML = "Accenture is one of the top IT firms in India and does mass recruitment each year from different colleges offering fresher level job to the final year students. The recruitment process is a fixed pattern that the company has been observed to be following. The student, who wishes to apply for Accenture, should have a good academic result from Secondary School Certificate onwards. The student should be a regular fulltime student and must have good interpersonal, analytical and communication skills along with the command over technical course. ";
		moreLink.href="http://accenture.com";
	}
	if(x=="intel") {
		logo.src="images/company/intel.png";
		moreInfo.innerHTML = "The Intel Website goes like this : At Intel, you can experience a world of opportunities—opportunities to explore a wide-range of careers, to develop industry-leading innovations, and to work with the latest technologies and brilliant minds across the globe! Join Intel India. We’re innovating to change the world.";
		moreLink.href="http://intel.in";
	}
	if(x=="infosys") {
		logo.src="images/company/infosys.png";
		moreInfo.innerHTML = "If you're starting out your career, Infosys arms you with all the tools you need to succeed. When you begin with us, you'll be part of an intensive and memorable training program that is widely recognized as one of the best in the world. During this period, you’ll discover your best skills. And soon enough, you'll be with one of our many technology or consulting groups. Here, you'll create unique business solutions while gaining valuable expertise and experience to put you on the fast lane to a successful career.We believe that to succeed as a company, we need to provide you the right learning opportunity for each unique aspiration.";
		moreLink.href="http://infosys.com";
	}
	if(x=="flipkart") {
		logo.src="images/company/flipkart.png";
		moreInfo.innerHTML = "Why Join Flipkart? Everyone’s a dreamer. But at Flipkart, we don’t believe in just thinking, we believe in implementing our ideas and seeing the impact it has on the world around us. Flipkart gives you the perfect space to learn, grow and exercise your expertise to make shopping delightful for everyone! Here, you get to make an impact everyday! Meeting expectations and just about reaching the bar is difficult enough. It's even harder to define something new, to set the bar yourself for your successors to follow. Flipkart is inherently about breaking pars. Born out the minds of two young, dynamic individuals, Flipkart has grown exponentially in a matter of a few years." ;
		moreLink.href="http://flipkart.com";
	}
	if(x=="codenation") {
		logo.src="images/company/codenation.png";
		moreInfo.innerHTML = "CodeNation is a provider of software solutions to companies. Headquartered in Bangalore, CodeNation is disrupting the way enterprise software is created by adopting a factory-style model for development and delivery. CodeNation was built from the ground up using its soul partner DevFactory’s innovative processes and tools on a revolutionary assembly line called ALINE. Unlike the conventional software development methodology, which is often costly, slow and can lead to quality issues, CodeNation automates much of the process of coding and testing. It has also been conducting development for 30+ enterprise products.";
		moreLink.href="http://codenation.co.in";
	}
	if(x=="redhat") {
		logo.src="images/company/redhat.png";
		moreInfo.innerHTML = "Red Hat, Inc. is an American multinational software company providing open-source software products to the enterprise community. Founded in 1993, Red Hat has its corporate headquarters in Raleigh, North Carolina, with satellite offices worldwide. Red Hat has become associated to a large extent with its enterprise operating system Red Hat Enterprise Linux and with the acquisition of open-source enterprise middleware vendor JBoss. Red Hat also offers Red Hat Enterprise Virtualization (RHEV), an enterprise virtualization product. Red Hat provides storage, operating system platforms, middleware, applications, management products, and support, training, and consulting services.";
		moreLink.href="http://redhat.com";
	}
	if(x=="wipro") {
		logo.src="images/company/wipro.jpg";
		moreInfo.innerHTML = "Wipro Technologies, one of India's largest software services companies, assesses more than 100,000 students, both on and off campus, and hires more than 20,000 graduates, to augment its workforce. There are three entry options for students: as science graduates, as non-science graduates and as engineers. What are the winning traits of a potential employee? Team skills, confidence and poise. We see if the candidate can fit into Wipro's culture as we place utmost importance on integrity. We want people to be Wipro's strength";
		moreLink.href="http://wipro.com";
	}
	if(x=="ibm") {
		logo.src="images/company/ibm.jpg";
		moreInfo.innerHTML = "Having found its base in 1998 and headquartered in Kolkata, Web Development Company Limited (WDC) offers a wide range of Internet solutions and recruitment related services in India, Asia Pacific Region and major parts of Europe. Location of Training Bangalore\nEligibility : 1) Experience : Fresh College Hires (0 -12 months exp.) 2) Education Qualification : BE/ BTech/ MTech (Pref. CS/CE/IT), MCA with 65% compulsory 3) Excellent Communication Skills Interview procedure: Written Test followed by Group Discussion.";
		moreLink.href="http://ibm.com";
	}
	if(x=="mindtree") {
		logo.src="images/company/mindtree.jpg";
		moreInfo.innerHTML = "Wipro Limited (Western India Palm Refined Oils Limited[3][4] or more recently, Western India Products Limited[1]) is an Indian multinational IT Consulting and System Integration services company headquartered in Bangalore, India.[5] As of March 2015, the company has 158,217 employees servicing over 900 of the Fortune 1000 corporations with a presence in 67 countries. On 31 March 2015, its market capitalization was approximately $ 35 Billion, making it one of India's largest publicly traded companies and seventh largest IT Services firm in the World.[6]";
		moreLink.href="http://mindtree.com";
	}
	if(x=="adobe") {
		logo.src="images/company/adobe.png";
		moreInfo.innerHTML = "Adobe is the leading global leader in digital media solutions and digital marketing. Different tools and services by the company is globally used in creating optimized digital content and give 100% customer satisfaction. Career at Adobe is fantastic and empowering as well as inspiring. The Placement Criteria of Adobe Company is explained in detail below to help the freshers as well as experienced job seekers in grabbing a job from job opening in Adobe India.";
		moreLink.href="http://adobe.com";
	}
	if(x=="dell") {
		logo.src="images/company/dell.png";
		moreInfo.innerHTML = "Dell Inc. is an American privately owned multinational computer technology company based in Round Rock, Texas, United States, that develops, sells, repairs, and supports computers and related products and services. Eponymously named after its founder, Michael Dell, the company is one of the largest technological corporations in the world, employing more than 103,300 people worldwide.[3]";
		moreLink.href="http://dell.co.in";
	}
	if(x=="sap") {
		logo.src="images/company/sap.png";
		moreInfo.innerHTML = "SAP SE (Systems, Applications & Products in Data Processing) is a German multinational software corporation that makes enterprise software to manage business operations and customer relations. SAP is headquartered in Walldorf, Baden-Württemberg, Germany, with regional offices in 130 countries.[2] The company has over 293,500 customers in 190 countries.[2] The company is a component of the Euro Stoxx 50 stock market index.[3]";
		moreLink.href="http://sap.com";
	}
	if(x=="emc2") {
		logo.src="images/company/emc2.png";
		moreInfo.innerHTML = "EMC Corporation (stylized as EMC²) is an American multinational corporation headquartered in Hopkinton, Massachusetts, United States.[3][4] EMC sells data storage, information security, virtualization, analytics, cloud computing and other products and services that enable businesses to store, manage, protect, and analyze data. EMC's target markets include large companies and small- and medium-sized businesses across various vertical markets.[5][6] The stock was added to the New York Stock Exchange on April 6, 1986,[7] and is also listed on the S&P 500 index.";
		moreLink.href="http://emc.com";
	}
	if(x=="lenovo") {
		logo.src="images/company/lenovo.png";
		moreInfo.innerHTML = "The key to our success at Lenovo is attracting high quality employees. With that in mind, we offer a market-competitive salary and benefits package that may include: *Health care options*Pension*Life insurance*Holidays.Our people : Lenovo develops, manufactures, and markets the most reliable, secure, and easy-to-use technology products. We are only successful when our customers achieve their goals: productivity in business and enhancement of personal life.";
		moreLink.href="http://lenovo.com";
	}
	if(x=="netapp") {
		logo.src="images/company/netapp.png";
		moreInfo.innerHTML = "Leadership, passion and ownership are qualities in every person at NetApp. We care about the products we create and support, but also about the path to our success. There is inspiration and encouragement at NetApp, every day and on every campus. All of us at NetApp make a difference and feel the impact of our work. Our collaborative environment fosters pride in our products and integrity built into every facet of our careers. At NetApp, you will not only enjoy your work, but be valued for it.";
		moreLink.href="http://netapp.com";
	}
	if(x=="siemens") {
		logo.src="images/company/siemens.png";
		moreInfo.innerHTML = "For around 90 years now, Siemens has been associated with the growth of emerging India. Be it modernizing India's infrastructure, enabling greener power generation or empowering hospitals with cutting-edge healthcare systems, Siemens in India is playing a major role in creating a sustainable future for the country. Siemens has brought world class technologies and infrastructure to emerging markets like India. Through its products and solutions, Siemens in India has touched the lives of several million Indian citizens. We need dedicated people from diverse backgrounds to sustainably enhance company’s values.";
		moreLink.href="http://siemens.com";
	}
	if(x=="symantec") {
		logo.src="images/company/symantec.png";
		moreInfo.innerHTML = "Symantec is an equal opportunity employer. All qualified applicants for employment will be considered without regard to race, color, religion, sex, gender identity, sexual orientation, national origin, status as an individual with a disability, veteran status, or any other basis protected by federal, state, or local law. Pursuant to the San Francisco Fair Chance Ordinance (FCO), we will also consider for employment qualified individuals with arrest and conviction records.";
		moreLink.href="http://symantec.com";
	}
	var closeLink = document.createElement("a");
	var close = document.createElement("img");
	close.id="close";
	close.src="images/close.png";
	closeLink.appendChild(close);
	closeLink.href="#";
	closeLink.onclick=function() {
		moreDiv.style.display="none";
		moreDiv.removeChild(moreInfo);	
	};
	moreDiv.appendChild(closeLink);
	moreDiv.appendChild(logo);	
	moreDiv.appendChild(moreInfo);
	moreDiv.appendChild(moreLink);
	moreDiv.style.height="0px";
	logo.style.height="0px";
	moreInfo.style.display="none";
	moreDiv.style.display="";
	
	var count=0;
	var interval = window.setInterval(function() {
		count++;
		if(count>50) {
			moreInfo.style.display="";
			window.clearInterval(interval);
			interval=null;
		}
		moreDiv.style.height=8*count+"px";
		logo.style.height=count+"px";
	}, 5);
	
}