#!/bin/bash
#****************************************************************#
# Create Date: 2019-02-13 10:15
#********************************* ******************************#

service_name="wordpress"
export INGRESSGATEWAY=istio-ingressgateway
export IP_ADDRESS=$(kubectl get svc $INGRESSGATEWAY --namespace istio-system --output jsonpath="{.status.loadBalancer.ingress[*]['ip']}")
echo "IP_ADDRESS: ${IP_ADDRESS}"

export GATEWAY_IP=`kubectl get svc $INGRESSGATEWAY --namespace istio-system --output jsonpath="{.status.loadBalancer.ingress[*]['ip']}"`
export DOMAIN_NAME=`kubectl get route ${service_name} --output jsonpath="{.status.domain}"`

kubectl get ksvc ${service_name} --output=custom-columns=NAME:.metadata.name,DOMAIN:.status.domain
# export HOST_URL=$(kubectl get ksvc helloworld-go  --output jsonpath='{.status.domain}')
curl -H "Host: ${DOMAIN_NAME}" http://${IP_ADDRESS} -v
