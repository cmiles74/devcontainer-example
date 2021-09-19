FROM mcr.microsoft.com/vscode/devcontainers/java:16-bullseye

# update packages
RUN apt update -y
RUN apt upgrade -y

# install php
RUN apt install -y php-cli

ENTRYPOINT ["/bin/bash"]
