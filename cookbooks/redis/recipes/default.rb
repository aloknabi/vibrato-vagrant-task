#
# Cookbook Name:: redis
# Recipe:: default
#
# Copyright (c) 2016 The Authors, All Rights Reserved.

package 'redis-server' do 
	action :install
end

package 'redis-tools' do
	action :install
end