<?php
class Content {
	public function __construct() {
		echo "<main id='content'>";
		$this->subheader();
		$this->getArticle();
		echo "</main>";
	}

	private function subheader() {
	echo <<< EOD
	<div id='subheader'>
		<h1>Resume of Amy Yuen Ying Chan</h1>
		<p class="italic">Note that my LinkedIn profile is typically more up-to-date. Please feel free to <a href="https://www.linkedin.com/in/amyyychan" aria-label="Amy's Linkedin">
make a <i class="fa fa-linkedin-square" aria-hidden="true"></i> connection!</a></p><br />
	</div>
	<hr>
EOD;
	}

	private function getArticle() {
	echo <<< EOD
		<br>
		<h3 class="underlined">SUMMARY</h3>
		<ul class="textual">
			<li class="italic">Detail-oriented, dependable, and driven professional with excellent record in team communication, project coordination, and ability to work in fast-paced environment.</li>
			<li class="italic">Innovative and adaptable web developer with diverse knowledge, from programming language to multimedia tools, and a constant eagerness to learn more.</li>
		</ul>
		<br>
		<p>

		<h3 class="underlined">EDUCATION & PROFESSIONAL DEVELOPMENT</h3>
		<ul class="indent">
			<li class="bold-title">Certificates in Web Application Programming, 2015. Certificates in Linux Administration, Expected 2016. </li>
			<li>City College of San Francisco, 2013 – 2016.</li>
			<li><span class="italic">Relevant Coursework:</span> Python Programming, MySQL Databases, Advanced PHP Programming, Programming Fundamentals: C++, Network Security, Linux Administration Projects, WordPress & Drupal CMS Development.<li>
			<li>Bachelor of Architecture, California Polytechnic State University Jun 2011.</li>
			<li>Dean’s List Fall 2009.</li>
		</ul>
		<br>

		<h3 class="underlined">SKILLS</h3>
		<ul class="indent">
			<li><span class = "bold-title">Programming Language:</span> HTML5 & CSS3, Javascript (including jQuery & JSON), MySQL, PHP
(including MVC knowledge), Python, Java, C++, Bash, Git, LAMP stack, learning MEAN stack.</li>
			<li><span class = "bold-title">Graphic Program:</span> Adobe Creative Suite, (Photoshop, Illustrator, InDesign, Acrobat).</li>
			<li><span class = "bold-title">Language:</span>Cantonese Chinese (Native Fluency).</li>
		</ul>
		<br>

		<h3 class="underlined">EXPERIENCES</h3>
			<p><span class="bold-title">Website Volunteer at Bayview Boom,</span> Jan 16 – Mar 16.
			<ul class="textul">
				<li>Researched plugin options and features to be organized into Google Sheets. Customized plugin PHP files according to organization's needs.</li>
				<li>Worked with the director on site organization and idea brainstorming.</li>
			</ul>
			<p><span class="bold-title">Program Volunteer at Rebuilding Together SF,</span> San Francisco, Feb 14 – Current.
			<ul class="textul">
				<li>Facilitated client intake process of RTSF's projects and communicated with Program Managers on key issues in client's applications.</li>
				<li>Ensured appropriate paper-copies and correct Salesforce data entry had been done for each applicants in a consistent format. Followed up on unresponsive applicants.</li>
				<li>Phone interviewed in a patient and polite manner with a diverse applicant population, providing Chinese interpretation as needed. </li>
			</ul>
		    <p><span class="bold-title">Copy and Print Specialist at Office Depot,</span> San Francisco, CA, Jan 13 – Nov 14.
			<ul class="textul">
				<li>Performed print center services and managed long-term projects in a fast-paced and deadline-based environment.</li>
				<li>Maintained accuracy of final print production by maintaining constant communication with multiple departments, team members, and clients via in-person contact, email, fax, and phone.</li>
				<li>Ensured quality and correct format on client files prior to printing. Assist and troubleshoot on Adobe Creative Suite, Publisher, Word, and Excel format issues.</li>
			</ul>
		    <p><span class="bold-title">Outreach Coordinator Volunteer at Design Village Committee,</span> San Luis Obispo, CA, Oct 10 – Apr 11.
			<ul class="textul">
				<li>Set up and maintained competition's social media accounts. Updated participants on competition processes, including tracking down lost contacts, creating individualized invitations, and organizing registration packages.</li>
				<li>Answered or redirected specific questions to corresponding team members. Discussed ideas and event process in team meetings.</li>
			</ul>
		<br>
EOD;
	}
}
?>