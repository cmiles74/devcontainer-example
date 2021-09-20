FROM mcr.microsoft.com/vscode/devcontainers/php:8-bullseye

# update apt
RUN apt update

# install httpie
RUN apt install -y httpie

# install flyway
WORKDIR /usr/local
RUN wget -qO- https://repo1.maven.org/maven2/org/flywaydb/flyway-commandline/8.0.0-beta1/flyway-commandline-8.0.0-beta1-linux-x64.tar.gz \
| tar xvz && sudo ln -s `pwd`/flyway-8.0.0-beta1/flyway /usr/local/bin

WORKDIR ~
ENTRYPOINT ["/bin/bash"]
