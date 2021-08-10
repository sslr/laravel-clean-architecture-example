FROM mysql:5.7.29

ARG UID
ARG GID

LABEL maintainer="ms.salari@gmail.com"

RUN usermod -u ${UID} mysql && \
    groupmod -g ${GID} mysql
