-> ### Js is a programming language .

language - medium of communication.

programming language - using programming language human interact with  machine (computer,laptop).

-->Two types of programming language 

1.)  Low/assembly level - 01 ke form mein (binary no- 0 and 1 ke form mein).

2.) High level - human undesrstandable form english form .


## compiler - complete code executed  at a time then if any error  then show error.

## Interpreter - line by line code executed and if any error then show line by line error .

### A single-threaded program executes tasks one at a time, like a simple calculator performing one calculation at a time, while a multi-threaded program can handle multiple tasks concurrently, like a web browser simultaneously loading multiple pages, downloading files, and responding to user input, all happening seemingly at once due to different threads working on each task independently. 

### Js is a high level and interpreter and single-thread .

### Variable - variable is a container that stores some data.

i.e- 1--  a = 10;

console.log('value of a is :' ,a );  


i.e- 2--  a = 'ak';  (a = ak X)   (in place of single quote we use backtick)

console.log('value of a is :' ,a );  


### -> In js we can declare variable  using three keyword - let , var , const .


### const - declare allow , redeclare and reintialiise not allowed  and it is local scope. 

### let - declare and reintiallise allow and redeclare not allowed  and it is local scope.

### var -  all allow and it is global scope.

## we use let and const more.

### Datatype  --  using this we know about type of variable .


->  Two types of datatypes

1.)   Primitive Data - number , string , booleaan , null , undefined , symbol , bigint.
           
                 ## In null ,  

                            let a = null;
                            
                            console.log(a); 

            output : null


                          ## In undefined,

                               let a;

                             console.log(a); 
             
               output : undefined


## If ,   console.log(b); 

## output -  not defined


### In null if we initialize with null then give null , in undefined if we only declare variable not intialise then give undefined , in not defined if we don't recalere and initialise variable then give undefined . 



## In bigInt ,

## let a = 123;

## console.log(a);

## output :  123n   -   n bre number ke sath lgta isiliye n


## In symbol,

## let a = Symbol("ak");

## console.log(a);

## output :  Symbol(ak)


### 2.)   Non-Primitive Data -  object , aaray ,function .

## object - An object in JavaScript is a collection of properties, where each property is a key-value pair.


## const person = {

##   name: "Akanksha",

##   age: 25,

##   city: "Delhi"

## };

## console.log(person.name); // Output: Akanksha


## Operator - Operators in JavaScript are symbols that perform operations on variables and values.

## Arithmetic: + (add), - (subtract), * (multiply), / (divide), % (remainder), ** (power).

## Assignment: = (assign), += (add & assign), -= (subtract & assign), *= (multiply & assign), /= (divide & assign).

## Comparison: == (equal), === (strict equal), != (not equal), !== (strict not equal), > (greater), < (less), >= (greater/equal), <= (less/equal).

## Logical: && (AND), || (OR), ! (NOT).

## Ternary: condition ? trueValue : falseValue.


## In logical,

## AND (&&) → Returns true if both conditions are true.

## console.log(5 > 2 && 10 > 3); // true (both are true)

## console.log(5 > 2 && 10 < 3); // false (one is false)


## OR (||) → Returns true if at least one condition is true.

## console.log(5 > 2 || 10 < 3); // true (one is true)

## console.log(5 < 2 || 10 < 3); // false (both are false)


## NOT (!) → Reverses the boolean value.

## console.log(!true);  // false

## console.log(!false); // true



## Pre- increment and Post- increment 

## Pre-Increment (++x) → Increases the value first, then returns it.

## let x = 5;

## console.log(++x); // Output: 6 (First increment, then print)

## console.log(x);   // Output: 6 (Value remains increased)



## == and === 

## console.log(5 == "5");  // true (values are same, types ignored)

## console.log(5 === "5"); // false (values same, but types different)



## Post-Increment (x++) → Returns the value first, then increases it.

## let y = 5;

## console.log(y++); // Output: 5 (First print, then increment)

## console.log(y);   // Output: 6 (Value increased after printing)


### Function - A block of code which perform particular task , i.e resuable.



### ex-1-simple :  

function add(a, b) {

###     console.log(a + b); // Prints the sum directly

### }

### add(5, 3); // Output: 8




ex-2-with return:  ### 

         function add(a, b) {

###     return a + b;

### }

### let result = add(5, 3); // result = 8

### console.log(result); // Output: 8



### ex-3-without return:  

       function add(a, b) {

###     console.log(a + b); // Directly printing the sum

### }

### let result = add(5, 3); // No return value

### console.log(result); // Output: undefined




