# Simple_PHP_Auth
A Personal PHP Auth which you might find useful. Created for a Faster deployment of your Authentication Web App. 
I Basically use it for simple login/Register and stuffs like that.

# How to Use

You can take hold of this lib by.

1. Starting up your terminal and punching

<code>$ git clone https://github.com/Kofacts/Simple_PHP_Auth.git </code>


2. Having done that, the package would be installed in a folder named "Simple_PHP_Auth"


3. Create a New instance of the login class which takes two params. Connection name and DB Name with table users_details.

<code> $login = new login($connect,"user_details");</code>

4. Having done that, You can verify a user  by calling.

<code>$login->verifyLogin($_POST['username'],$_POST['password'],$callback_url,$error_message);</code>

5. You can also Check if the user is loggedin via:

<code>$login->isLoggedin();</code>


6. To register, you can use

<code>$login->register($username,$password,$email,$telephone,$address); in this order</code> 

7. Once the user is loggedin, you can redirect the user using the "redirect($url) method";

</code>$login->redirect($url);</code>

Actually more features are still been added.

# I Saw a Bug..
Wheew. That's Awesome, Do send me a mail obodugorapheal[at]gmail.com

# Contribute?
DO Send me a pull request.

# How to Thank Me?
Just Star. Actually... Em, that's just it.



