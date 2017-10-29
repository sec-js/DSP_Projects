FROM linode/lamp

RUN apt-get update && apt-get install -y php5-mysql php5-gd
COPY setgw.sh /setgw.sh
COPY mysql_start.sh /mysql_start.sh
COPY apache_start.sh /apache_start.sh
COPY apache_start_debug.sh /apache_start_debug.sh
COPY create_db.sh /create_db.sh
COPY exec.sh /exec.sh
COPY sed.sh /sed.sh
COPY sql_to_db.sh /sql_to_db.sh

LABEL ports="80" \
      type="server" \
      caps_add="NET_ADMIN" \

      actions.sed.command="/sed.sh " \ 
      actions.sed.description="Replace a string with another inside a file" \ 
      actions.sed.args.filename.val="" \
      actions.sed.args.filename.type="text" \
      actions.sed.args.string_one.val="" \
      actions.sed.args.string_one.type="text" \
      actions.sed.args.string_two.val="" \
      actions.sed.args.string_two.type="text" \

      actions.exec.command="/exec.sh " \ 
      actions.exec.description="Execute a command in the container" \ 
      actions.exec.args.command.val="mkdir hello" \
      actions.exec.args.command.type="text" \

      actions.start_apache.command="/apache_start.sh" \ 
      actions.start_apache.description="Start web server" \ 

      actions.start_apache_debug.command="/apache_start_debug.sh" \ 
      actions.start_apache_debug.description="Start web server in debug mode (all errors reported)" \ 

      actions.start_mysql.command="/mysql_start.sh" \ 
      actions.start_mysql.description="Start sql server" \ 


      actions.create_db.command="/create_db.sh" \ 
      actions.create_db.description="Create a new db, insert a name for new db" \ 
      actions.create_db.args.db_name.rule.pattern="^[a-zA-Z0-9_-]+$" \ 
      actions.create_db.args.db_name.val="" \ 
      actions.create_db.args.db_name.type="text" \ 

      actions.sql_to_db.command="/sql_to_db.sh" \ 
      actions.sql_to_db.description="Execute a sql file into a db (you must load a sql file in container first! ) " \ 
      actions.sql_to_db.args.db_name.val="" \ 
      actions.sql_to_db.args.db_name.type="text" \ 
      actions.sql_to_db.args.sql_file.val="" \ 

      actions.setgw.command="/setgw.sh" \ 
      actions.setgw.description="Set default gateway  <name container gateway> " \ 
      actions.setgw.args.gateway.val="" \
      actions.setgw.args.gateway.type="text" \
      actions.setgw.args.gateway.rule.pattern="^[a-zA-Z0-9_-]+$" \
