#
# Cookbook Name:: database
# Recipe:: default
#
# Copyright (c) 2016 The Authors, All Rights Reserved.

mysql_service 'default' do
	version '5.5'
	action [:create, :start]
end