base image [php7.1/fpm-alpine](https://code.aliyun.com/knative-samples/fpm-alpine)

wordpress 官方镜像 Dockerfile : https://github.com/kubeway/wordpress 

## 添加自定义域名    
kubectl edit cm config-domain --namespace knative-serving 
