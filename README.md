# Development Containers for Visual Studio Code and GitHub Codespaces

Visual Studio Code has a nifty feature called [development containers][0] 
("devcontainers"), it lets you use Docker to setup your development environment.
A lot of us have variations on this in place already but the nifty idea 
with Code is that you do your development _inside the container._ That is, you
install all of the tools that you need (i.e. NodeJS, Ruby, etc.) into one 
container and then use that for your development environment.

Then there's [GitHub Codespaces][1], this leverages development containers to
deploy Docker containers _in the cloud_ and then you do your work inside of
those cloud-deployed containers. Even niftier, you can choose to use the web-
based Visual Studio Code editor right from the GitHub website or you can click
a button and use the copy of Code that you have installed on your local 
machine.

## What's in this Project?

This project provides a devcontainer running PHP that you can use to do your
all of your development work, it has the PHP and PostgreSQL extensions installed
already. There's another container named `mysql_db` that's running MySQL, 
you can use this to persist data for your project. When the containers start
up we also create one running [Flyway][4], it runs the migrations for our 
application.

Lastly there's a container named `webserver` running Apache and PHP, it's 
serving the files from the `src` directory of this project.

If you run on your local machine, you should be able to see the 
[the webserver on port 9080](http://localhost:9080), if you're running on 
Cloudspace then this port will be forwarded out into it's own URL (in the 
"Ports" tab of Visual Studio Code). You can connect to the database server 
using the installed PostgreSQL extension using the default port. The 
credentials are...

* Server Name: mysql_db
* Account Name: example_account
* Password: applesauce
* Database: example

Note that the database server isn't available outside the container 
environment, in this project you must use tools from inside Visual Studio 
Code.

If you need your own migrations, you can open a terminal in your development
container and invoke Flyway like so...

    flyway migrate

The basic idea here is to provide a semi-complicated development environment so
that you can get an idea of how it all works.

## Deployment Environments

You can build and run your devcontainer in the following environments...
* [Docker][2]
* [Docker Desktop][3]
* GitHub Codespace

It's worth reviewing the first two as it's very easy to get them confused and
the abysmal documentation from Docker only makes this worse. The
long and short of it is that devcontainers work great on your local machine when
your local machine is Linux and decently well on MacOS or Windows as long as 
your project isn't too big. 

If you have a big project and you are on Windows or MacOS then Codespace is the
way to go. For my large test project, Visual Studio Code times out during the
startup of the container because it's takes _so long_ for the files to make it
out to the container.  This project will work in all three!

### Docker

When you are on a Linux machine, you can run Docker on top of your existing
Linux installation. In this case Docker is running as a process on your machine,
it's just another application you are running. The containers you run are simply
more processes on your machine and it all works great.

More importantly, when you share files from your local machine with a container
the performance is pretty good.

To connect to the webserver, use [http://localhost:9080](http://localhost:9080).

### Docker Desktop

On MacOS or Windows you likely use Docker Desktop to manage your containers. The
way this works is that Docker Desktop creates a virtual machine running Linux, 
Docker itself and any containers you may run are processes _inside the virtual 
Linux machine._ Their goofy management application sure is native, the rest of it
very much is not. `;-)`

For the most part this works pretty well but when you share files from your local
machine what really happens is that those files are shared with the virtual 
machine that's running Docker. From there, they are shared again with your Docker
containers. As you have guessed or even noticed, performance is not great.

To connect to the webserver, use [http://localhost:9080](http://localhost:9080).

### GitHub Codespace

When you run on Codespace, GitHub provisions Linux containers and handles the 
sharing of your project with those containers for you. It's all transparent and
pretty performant so we're not really concerned with the nitty-gritty of how it 
works. It works well enough even for large projects.

To connect to the webserver, open the lower panel (where the "Terminal" tab is
displayed) and click on the "Ports" tab. There will be one listed and you can
click on the URL to open it in your browser.

## Developing with Several Containers

This project provides an example devcontainer that deploys one development
container and a couple other related containers. The development container is
on the same network as the other containers, when you connect to the development
container with Code you can see everything and do all of your work inside the
container. As you make changes you can commit them and push them to GitHub.

This example project is small enough that it will work under MacOS, Windows or
Linux. It took me a while to get it all working so I thought I'd write it all
down for posterity.

## Help Wanted!

If you notice any bugs or think of a better way to get this done, please send 
me a pull request!

----
[0]: https://code.visualstudio.com/docs/remote/containers
[1]: https://docs.github.com/en/codespaces
[2]: https://docs.docker.com/
[3]: https://docs.docker.com/get-docker/
[4]: https://flywaydb.org/