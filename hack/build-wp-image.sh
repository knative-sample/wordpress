#!/bin/bash
#****************************************************************#
# Create Date: 2019-02-02 22:16
#********************************* ******************************#

ROOTDIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

NAME="wordpress"
TAG="5.2.1-$(date +%Y''%m''%d''%H''%M''%S)"
NS="knative-sample"

docker build -t "${NAME}:${TAG}" -f ${ROOTDIR}/Dockerfile ${ROOTDIR}/../

array=( registry.cn-hangzhou.aliyuncs.com registry.cn-beijing.aliyuncs.com)
for registry in "${array[@]}"
do
    echo "push images to ${registry}/${NS}/${NAME}:${TAG}"
    docker tag "${NAME}:${TAG}" "${registry}/${NS}/${NAME}:${TAG}"
    docker push "${registry}/${NS}/${NAME}:${TAG}"

    docker tag "${NAME}:${TAG}" "${registry}/${NS}/${NAME}:latest"
    docker push "${registry}/${NS}/${NAME}:latest"
done
