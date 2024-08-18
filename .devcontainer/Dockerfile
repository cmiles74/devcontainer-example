FROM mcr.microsoft.com/vscode/devcontainers/php:latest

# update apt
RUN apt update

# install httpie
RUN apt install -y httpie

# install flyway
WORKDIR /usr/local
RUN wget -qO- https://download.red-gate.com/maven/release/com/redgate/flyway/flyway-commandline/10.17.1/flyway-commandline-10.17.1-linux-x64.tar.gz \
| tar -xvz && sudo ln -s `pwd`/flyway-10.17.1/flyway /usr/local/bin
RUN chmod +x /usr/local/bin/flyway

WORKDIR ~
ENTRYPOINT ["/bin/bash"]
