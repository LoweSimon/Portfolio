
/**
 *  
 * @author Simon Lowe
 * @version 05/10/2018
 */
public class RoomSafe
{
   
   //Declaring a Private Instance variable  String password;
private String password;


//Constructor for roomSafe
public RoomSafe()
{
   
   //Inistialise the password
   this.password = "Adminadmin1";
   
}

//Getter method for password instance variable
public String getPassword()
{
   return this.password;
}

//Instance method to check password length
public boolean isValidLength(String pw)
{
   if (pw.length() >= 8)   {
      return true;
   } else {
      return false;
   }
   };

public boolean hasDigit(String pw)
{    // Assume initially that the string contains no digits.
      boolean result = false;
        // Examine each character of pw in turn.
   for (int i = 0; i < pw.length(); i++)
        {
           // If the character at position i is a digit, 
           // set result to true
           if (Character.isDigit(pw.charAt(i)))
           {
             result = true;
           }
        }
        return result;
   }

public boolean hasUpperCase(String pw)
{
   boolean result = false;
   
   for (int i = 0; i < pw.length(); i++)
   {
      if (Character.isUpperCase(pw.charAt(i)))
      {
         result = true;
      }
   }
   return result;
}

//Method to check password meets each rule
public boolean isValidPassword(String pw)
{
   return this.hasUpperCase(pw) && this.hasDigit(pw) && this.isValidLength(pw);
   
}


public void setPassword(String pw)
{
   if (this.isValidPassword(pw) == true)
   {
      this.password = pw; 
      System.out.println ("The password " + pw + " is valid");
   }
   else
   {
      System.out.println ("The password " + pw + " is not valid");
   }
}

public boolean hasChanged(String pw)
{
   boolean result = false;
   
   if (this.password != pw)
   {
      return true;
   }
   return result;
}
   
   
   
   





};
