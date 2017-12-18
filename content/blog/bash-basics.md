+++
categories = ["Progamming"]
comments = true
date = 2017-12-18T18:17:31+05:30 
draft = false
showpagemeta = true
showcomments = true
slug = ""
tags = ["bash", "programming", "hooli", "hardware"]
title = "Bash Basics"
description = "A post about Bash Basics"

+++

In this tutorial you will how to write bash scripts. I will take you step from Hello world to writing your own script that does some repetitive task for you. So, lets get started.

Bash stands for Bourne Again shell. If you are using Linux or MAC OS you already have it install by default.

You can check which version of bash you are using by 

```bash -v```

let us create our first bash script that says Hello World. Create a file named helloworld or helloworld.sh. Open in your favorite text editor i will use vim, you can use any eg :nano, gedit, etc.
This first line of your script will be #!/bin/bash #! is known as shebang. Which is path to load and run the program using bash. In the next line write echo Hello World.

```vim hellworld```

```#!/bin/bash
echo Hello World```
 
```chmod 777 helloworld
./helloworld or bash helloworld```
