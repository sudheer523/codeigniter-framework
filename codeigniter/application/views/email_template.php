<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title></title>
 </head>
 <body>
   <h1></h1>
   <h2>Send an Email</h2>
   <?php echo validation_errors(); ?>
   <?php echo form_open('emaileaxmple'); ?>
     <label for="name">Name:</label>
     <input type="text" size="20" id="username" name="name"/>
     <br/>
     <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email"/>
     <br/>
     <label for="subject">Subject:</label>
	      <input type="text" size="20" id="email" name="subject"/>
     <br/>
     <label for="message">Message:</label>
	      <input type="text" size="20" id="email" name="message"/>
     <br/>
     <input type="submit" value="Submit"/><br>
     <a href='index.php/user'> Register</a><br>
	 <a href='index.php/errorlog'> Error Handling</a>
	 
   </form>
 </body>
</html>

