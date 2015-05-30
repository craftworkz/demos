FROM registry-ice.ng.bluemix.net/ibmliberty:latest

#COPY target/helloworld-1.0-RELEASE.war /opt/ibm/wlp/usr/servers/defaultServer/dropins/
COPY target/sample.war /opt/ibm/wlp/usr/servers/defaultServer/dropins/

ENV LICENSE accept

EXPOSE 9080
# Run Liberty via the supervisor
CMD ["/root/bin/run_supervisor"]
