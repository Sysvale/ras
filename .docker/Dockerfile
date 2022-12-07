FROM ubuntu:20.04

LABEL Author="Elayne Lemos elayne.lemos@sysvale.com"

# Image ENV variables
ENV PATH ${PATH}:/usr/local/bin:/usr/local/sbin:/usr/bin:/sbin:/bin:/usr/sbin
ENV TZ=America/Recife
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
# Install basic packages
  && apt-get update \
  && apt-get upgrade -y \
  && apt-get install -y --no-install-recommends \
  automake \
  bison \
  flex \
  gcc \
  g++ \
  libboost-all-dev \
  libboost-dev \
  libboost-test-dev \
  libboost-program-options-dev \
  libboost-filesystem-dev \
  libboost-thread-dev \
  libevent-dev \
  libssl-dev \
  libtool \
  make \
  pkg-config \
  wget \
  && wget https://downloads.apache.org/thrift/0.17.0/thrift-0.17.0.tar.gz --no-check-certificate \
  && tar -xvf thrift-0.17.0.tar.gz && cd thrift-0.17.0 \
  && ./bootstrap.sh \
  && ./configure --bindir=/usr/local/bin \
  && make && make install  && cd /tmp \
  && thrift -version \
# Cleanup
#   && apt purge software-properties-common \
  && apt purge make -y \
  && apt-get autoremove -y \
  && apt-get clean \
  && apt-get autoclean \
  && rm -rf /var/lib/apt/lists/* \
  && rm -rf /tmp/*

WORKDIR /root
