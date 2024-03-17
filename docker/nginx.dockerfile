FROM nginx:1.24.0

# Environment arguments
ARG UID
ARG GID
ARG USER

ENV UID=${UID}
ENV GID=${GID}
ENV USER=${USER}

# Dialout group in Alpine Linux conflicts with MacOS staff group's gid, which is 20
RUN delgroup dialout

# Creating user and group
RUN addgroup --gid ${GID} --system ${USER}
RUN adduser --ingroup ${USER} --system --disabled-password --shell /bin/sh -u ${UID} ${USER}

# Modify Nginx configuration to use the new user's privileges
RUN sed -i "s/user nginx/user '${USER}'/g" /etc/nginx/nginx.conf

# Copies nginx configurations to override the default
ADD ./nginx/default.conf /etc/nginx/conf.d/

# Install Vim for debugging
RUN apt-get update && apt-get install -y vim

# Make html directory
RUN mkdir -p /var/www/html