FROM php:7.0-apache
MAINTAINER Ian Droogmans <ian@medianeut.be>

# Install base packages
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get -yq install \
        rubygems \
     && \
     gem install sass

# Add entrypoint
ADD docker-entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
