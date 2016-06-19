#
# Cookbook Name:: database
# Recipe:: default
#
# Copyright (c) 2016 The Authors, All Rights Reserved.
mysql_service 'db' do
	port '3306'
	version '5.5'
	initial_root_password 'secret'
	bind_address '0.0.0.0'
	action [:create, :start]
end

mysql_client  'default' do
	action :create
end